<?php

/*
 * This file is part of the Indigo Benchmark package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Benchmark\Reflection\PropertyFiltering;

use Athletic\AthleticEvent;

/**
 * Tests which way is the fastest to filter reflection properties
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Benchmark extends AthleticEvent
{
    protected $reflection;

    public function setUp()
    {
        $this->reflection = new \ReflectionClass(new Example);
    }

    /**
     * @iterations 1000
     */
    public function testBuiltInFiltering()
    {
        array_diff(
            $this->reflection->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED),
            $this->reflection->getProperties(\ReflectionProperty::IS_STATIC)
        );
    }

    /**
     * @iterations 1000
     */
    public function testArrayFiltering()
    {
        array_filter(
            $this->reflection->getProperties(),
            function (\ReflectionProperty $property) {
                return ($property->isPublic() || $property->isProtected()) && ! $property->isStatic();
            }
        );
    }

    /**
     * @iterations 1000
     */
    public function testCombinedFiltering()
    {
        array_filter(
            $this->reflection->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED),
            function (\ReflectionProperty $property) {
                return ! $property->isStatic();
            }
        );
    }
}
