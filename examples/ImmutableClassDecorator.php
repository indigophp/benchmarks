<?php

namespace Indigo\Benchmark\Examples;

/**
 * Immutable decorator.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
final class ImmutableClassDecorator
{
    private $example;

    public function __construct(ImmutableExample $example)
    {
        $this->example = $example;
    }

    public function withProperty($value)
    {
        $new = clone $this;
        $new->example = $this->example->withProperty($value);

        return $new;
    }
}
