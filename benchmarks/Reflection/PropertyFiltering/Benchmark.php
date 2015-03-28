<?php

/*
 * This file is part of the Indigo Benchmark package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Benchmark\Reflection\PropertyFiltering;

use Athletic\AthleticEvent;

/**
 * Tests which way is the fastest to filter reflection properties
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Benchmark extends AthleticEvent
{
    protected $example;

    public function setUp()
    {
        $this->example = new Example;
    }

    /**
     * @iterations 1000
     */
    public function testBuiltInFiltering()
    {
        $reflection = new \ReflectionClass($this->example);

        $reflectionProperties = array_diff(
            $reflection->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED),
            $reflection->getProperties(\ReflectionProperty::IS_STATIC)
        );
    }

    /**
     * @iterations 1000
     */
    public function testArrayFiltering()
    {
        $reflection = new \ReflectionClass($this->example);

        $reflectionProperties = array_filter(
            $reflection->getProperties(),
            function (\ReflectionProperty $property) {
                return ($property->isPublic() || $property->isProtected()) && ! $property->isStatic();
            }
        );
    }

    /**
     * @iterations 1000
     */
    public function testCombinedFiltering()
    {
        $reflection = new \ReflectionClass($this->example);

        $reflectionProperties = array_filter(
            $reflection->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED),
            function (\ReflectionProperty $property) {
                return ! $property->isStatic();
            }
        );
    }
}
