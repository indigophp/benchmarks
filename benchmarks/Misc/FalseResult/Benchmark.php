<?php

/*
 * This file is part of the Indigo Benchmark package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Benchmark\Misc\FalseResult;

use Athletic\AthleticEvent;

/**
 * Tests which way is the fastest to return a false value
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Benchmark extends AthleticEvent
{
    /**
     * @iterations 1000
     */
    public function testEmptyFunction()
    {
        empty(true);
    }

    /**
     * @iterations 1000
     */
    public function testClosure()
    {
        $test = function() {
            return false;
        };

        $test(true);
    }
}
