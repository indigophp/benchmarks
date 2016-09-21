<?php

namespace Indigo\Benchmark\Examples;

/**
 * Immutable example.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
final class ImmutableExample
{
    private $property;

    public function withProperty($value)
    {
        $new = clone $this;
        $new->property = $value;

        return $new;
    }
}
