<?php declare(strict_types = 1);

namespace App\Tests\Benchmark;

use App\Model\Person;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class ArrayFilterVsForeachBench
{
    /**
     * @Revs(10000)
     * @Iterations(50)
     * @OutputTimeUnit("milliseconds", precision=10)
     */
    public function benchFilterByArrayFilter(): void
    {
        $people = self::getPersonTestingData();
        $activePeople = array_filter($people, static fn (Person $person) => $person->isActive());
    }

    /**
     * @Revs(10000)
     * @Iterations(50)
     * @OutputTimeUnit("milliseconds", precision=10)
     */
    public function benchFilterByForeach(): void
    {
        $people = self::getPersonTestingData();
        $activePeople = [];
        foreach ($people as $person) {
            if ($person->isActive()) {
                $activePeople[] = $person;
            }
        }
    }

    /**
     * @return array<Person>
     */
    private static function getPersonTestingData(): array
    {
        return [
            new Person('John Doe', false),
            new Person('John Doe 2', true),
            new Person('John Doe 3', false),
            new Person('John Doe 4', true),
            new Person('John Doe 5', false),
            new Person('John Doe 6', true),
            new Person('John Doe 7', false),
            new Person('John Doe 8', true),
            new Person('John Doe 9', false),
            new Person('John Doe 10', true),
        ];
    }
}
