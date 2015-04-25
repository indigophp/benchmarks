<?php

/*
 * This file is part of the Indigo Benchmark package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Benchmark\Test\Existence;

use Athletic\AthleticEvent;

/**
 * Tests which way is the fastest to check if a variable has been set
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Benchmark extends AthleticEvent
{
    protected $var;

    public function setUp()
    {
        $this->var = new \stdClass;
    }

    /**
     * @iterations 1000
     */
    public function testIsset()
    {
        isset($this->var);
    }

    /**
     * @iterations 1000
     */
    public function testComparison()
    {
        $this->var !== null;
    }
}
