<?php

namespace Indigo\Benchmark;

use PhpBench\Benchmark\Metadata\Annotations\Groups;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\ParamProviders;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Tests which way is the fastest to loop through a set of elements and modify them.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @Groups({"arrays", "iteration"})
 * @ParamProviders({"dataProvider"})
 * @Revs(1000)
 * @Iterations(5)
 */
final class ModifyIterationBench
{
    /**
     * Test a simple foreach.
     *
     * @param array|\ArrayObject $data
     */
    public function benchForeach($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = 'b';
        }
    }

    /**
     * Test a simple foreach with a value reference.
     *
     * @param array|\ArrayObject $data
     */
    public function benchForeachReference($data)
    {
        foreach ($data as $key => &$value) {
            $value = 'b';
        }
    }

    /**
     * Test an array map.
     *
     * @param array|\ArrayObject $data
     */
    public function benchArrayMap($data)
    {
        $data = array_map(function () {
            return 'b';
        }, $data);
    }

    /**
     * Test array walk.
     *
     * @param array|\ArrayObject $data
     */
    public function benchArrayWalk($data)
    {
        array_walk($data, function (&$item) {
            $item = 'b';
        });
    }

    /**
     * Provide data for the benchmark.
     *
     * @return array
     */
    public function dataProvider()
    {
        return [
            // Large dataset
            array_fill(
                PHP_INT_MAX / 4, // Does not work with too high number
                1000,
                str_repeat('a', 10000)
            ),

            // Iterable object
            new \ArrayObject(array_fill(
                100000000,
                100,
                str_repeat('a', 10000)
            )),
        ];
    }
}
