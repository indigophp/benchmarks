<?php

namespace Indigo\Benchmark\Reflection;

use Indigo\Benchmark\Examples\Example;
use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Groups;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Tests which way is the fastest to detect class name.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @BeforeMethods({"init"})
 * @Groups({"reflection"})
 * @Revs(1000)
 * @Iterations(5)
 */
final class ClassNameDetectionBench
{
    /**
     * @var Example
     */
    private $example;

    public function init()
    {
        $this->example = new Example();
    }

    public function benchExplode()
    {
        $className = explode('\\', get_class($this->example));
        array_pop($className);
    }

    public function benchSubstring()
    {
        substr(strrchr(get_class($this->example), '\\'), 1);
    }

    public function benchReflection()
    {
        (new \ReflectionClass($this->example))->getShortName();
    }
}
