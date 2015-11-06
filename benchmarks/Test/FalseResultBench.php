<?php

namespace Indigo\Benchmark\Test;

use PhpBench\Benchmark\Metadata\Annotations\Groups;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Tests which way is the fastest to return a false value.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @Groups({"test"})
 * @Revs(1000)
 * @Iterations(5)
 */
final class FalseResultBench
{
    public function benchEmptyFunction()
    {
        empty(true);
    }

    public function benchClosure()
    {
        $test = function () {
            return false;
        };

        $test(true);
    }
}
