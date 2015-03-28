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

/**
 * Contains various properties to choose from
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Example
{
    private $a = 'a';
    protected $b = null;
    public $c = 1;
    static $d = true;
    public $e = -1;
    protected $f = 'F';
    private $g = 1.0;
    static $h = -1.0;
    public $i = PHP_INT_MAX;
    protected $j;
    private $k;
    static $l;
}
