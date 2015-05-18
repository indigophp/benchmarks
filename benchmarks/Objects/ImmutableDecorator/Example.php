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
 * Immutable example
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Example
{
    private $property;

    public function withProperty($value)
    {
        $new = clone $this;
        $new->property = $value;

        return $new;
    }
}
