<?php

/*
 * This file is part of the Indigo Benchmark package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Benchmark\Objects\ImmutableDecorator;

/**
 * Immutable decorator
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Decorator
{
    private $example;

    public function __construct(Example $example)
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
