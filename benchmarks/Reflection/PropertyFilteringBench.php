<?php

namespace Indigo\Benchmark\Reflection;

use Indigo\Benchmark\Examples\PropertyExample;
use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Groups;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Tests which way is the fastest to filter reflection properties.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @BeforeMethods({"init"})
 * @Groups({"reflection"})
 * @Revs(1000)
 * @Iterations(100)
 */
final class PropertyFilteringBench
{
    /**
     * @var \ReflectionClass
     */
    private $reflection;

    public function init()
    {
        $this->reflection = new \ReflectionClass(new PropertyExample());
    }

    public function benchBuiltInFiltering()
    {
        array_diff(
            $this->reflection->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED),
            $this->reflection->getProperties(\ReflectionProperty::IS_STATIC)
        );
    }

    public function benchArrayFiltering()
    {
        array_filter(
            $this->reflection->getProperties(),
            function (\ReflectionProperty $property) {
                return ($property->isPublic() || $property->isProtected()) && !$property->isStatic();
            }
        );
    }

    public function benchCombinedFiltering()
    {
        array_filter(
            $this->reflection->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED),
            function (\ReflectionProperty $property) {
                return !$property->isStatic();
            }
        );
    }
}
