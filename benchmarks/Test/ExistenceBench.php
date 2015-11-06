<?php

namespace Indigo\Benchmark\Test;

use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Groups;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Tests which way is the fastest to check if a variable has been set.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @BeforeMethods({"init"})
 * @Groups({"test"})
 * @Revs(1000)
 * @Iterations(5)
 */
final class ExistenceBench
{
    private $var;

    public function init()
    {
        $this->var = new \stdClass();
    }

    public function benchIsset()
    {
        isset($this->var);
    }

    public function benchComparison()
    {
        $this->var !== null;
    }
}
