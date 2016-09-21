<?php

namespace Indigo\Benchmark\Objects;

use Indigo\Benchmark\Examples\ImmutableClassDecorator;
use Indigo\Benchmark\Examples\ImmutableExample;
use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Groups;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Test immutable decorator.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @BeforeMethods({"init"})
 * @Groups({"immutability"})
 * @Revs(1000)
 * @Iterations(5)
 */
final class ImmutableDecoratorBench
{
    /**
     * @var ImmutableExample
     */
    private $example;

    /**
     * @var ImmutableClassDecorator
     */
    private $decorator;

    public function init()
    {
        $this->example = new ImmutableExample();
        $this->decorator = new ImmutableClassDecorator(new ImmutableExample());
    }

    /**
     * Test immutability with an example class.
     */
    public function benchImmutableClass()
    {
        $this->example->withProperty('value');
    }

    /**
     * Test immutability with a decorator.
     */
    public function benchImmutableDecorator()
    {
        $this->decorator->withProperty('value');
    }
}
