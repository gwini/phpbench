<?php declare(strict_types = 1);

namespace App\Tests\Benchmark;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class SubstrVsStringIndex
{
    /**
     * @Revs(10000)
     * @Iterations(50)
     * @OutputTimeUnit("milliseconds", precision=10)
     */
    public function benchCheckIfStringTrailingWithBackslashStringIndex(): void
    {
        $testedString = '123/';
        $result = $testedString[strlen($testedString)-1] === '/';
    }
    /**
     * @Revs(10000)
     * @Iterations(50)
     * @OutputTimeUnit("milliseconds", precision=10)
     */
    public function benchCheckIfStringTrailingWithBackslashSubstr(): void
    {
        $testedString = '123/';
        $result = substr($testedString, -1) === '/';
    }

}