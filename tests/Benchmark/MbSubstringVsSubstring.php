<?php declare(strict_types = 1);

namespace App\Tests\Benchmark;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class MbSubstringVsSubstring
{
    /**
     * @Revs(10000)
     * @Iterations(50)
     * @OutputTimeUnit("milliseconds", precision=10)
     */
    public function benchSubStrShort(): void
    {
        $result = substr(self::getShortString(), 2, 3);
    }

    /**
     * @Revs(10000)
     * @Iterations(50)
     * @OutputTimeUnit("milliseconds", precision=10)
     */
    public function benchMbSubStrShort(): void
    {
        $result = mb_substr(self::getShortString(), 2, 3, 'UTF-8');
    }


    private static function getShortString(): string
    {
        return 'abcd efg';
    }
}
