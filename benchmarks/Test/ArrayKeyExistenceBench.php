<?php

namespace Indigo\Benchmark\Test;

use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Groups;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Tests which way is the fastest to check if an array key exists.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @BeforeMethods({"init"})
 * @Groups({"test"})
 * @Revs(1000)
 * @Iterations(100)
 */
final class ArrayKeyExistenceCheckBench
{
    private $array = [];

    public function init()
    {
        $this->array = array_fill_keys(array_fill(
            PHP_INT_MAX / 4, // Does not work with too high number
            1000,
            str_repeat('a', 10000)
        ), 'asdadsa');
    }

    public function initKey()
    {
        $this->array['key'] = 'value';
    }

    public function benchNonExistingKeyArrayKeyExists()
    {
        array_key_exists('key', $this->array);
    }

    public function benchNonExistingKeyErrorHandling()
    {
        try {
            $this->array['key'];
        } catch (\ErrorException $e) {
        }
    }

    /**
     * @BeforeMethods({"initKey"})
     */
    public function benchExistingKeyArrayKeyExists()
    {
        array_key_exists('key', $this->array);
    }

    /**
     * @BeforeMethods({"initKey"})
     */
    public function benchExistingKeyErrorHandling()
    {
        try {
            $this->array['key'];
        } catch (\ErrorException $e) {
        }
    }
}
