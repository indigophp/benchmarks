<?php

/*
 * This file is part of the Indigo Benchmark package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Benchmark\Arrays\ModifyIteration;

use Athletic\AthleticEvent;

/**
 * Tests which way is the fastest to loop through a set of elements and modify them
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Benchmark extends AthleticEvent
{
    protected $data = [];

    public function setUp()
    {
        $this->data = array_fill(100000000000000000000000, 100, str_repeat('a', 10000));
    }

    /**
     * @iterations 1000
     */
    public function testForeach()
    {
        foreach ($this->data as $key => $value) {
            $this->data[$key] = 'a';
        }
    }

    /**
     * @iterations 1000
     */
    public function testArrayMap()
    {
        $this->data = array_map(function() {
            return 'a';
        }, $this->data);
    }
}
