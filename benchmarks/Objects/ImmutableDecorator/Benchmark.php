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

use Athletic\AthleticEvent;

/**
 * Tests which way is the fastest to detect class name
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Benchmark extends AthleticEvent
{
    protected $example;
    protected $decorator;

    public function setUp()
    {
        $this->example = new Example;
        $this->decorator = new Decorator(new Example);
    }

    /**
     * @iterations 1000
     */
    public function testExample()
    {
        $this->example->withProperty('value');
    }

    /**
     * @iterations 1000
     */
    public function testDecorator()
    {
        $this->decorator->withProperty('value');
    }
}
