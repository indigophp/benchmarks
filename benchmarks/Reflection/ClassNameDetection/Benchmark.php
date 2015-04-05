<?php

/*
 * This file is part of the Indigo Benchmark package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Benchmark\Reflection\ClassNameDetection;

use Athletic\AthleticEvent;

/**
 * Tests which way is the fastest to detect class name
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Benchmark extends AthleticEvent
{
    protected $example;

    public function setUp()
    {
        $this->example = new Example;
    }

    /**
     * @iterations 1000
     */
    public function testExplode()
    {
        $className = explode('\\', get_class($this->example));
        array_pop($className);
    }

    /**
     * @iterations 1000
     */
    public function testSubstring()
    {
        substr(strrchr(get_class($this->example), "\\"), 1);
    }

    /**
     * @iterations 1000
     */
    public function testReflection()
    {
        (new \ReflectionClass($this->example))->getShortName();
    }
}
