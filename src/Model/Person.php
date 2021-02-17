<?php declare(strict_types = 1);

namespace App\Model;

class Person
{
    protected string $name;
    protected bool $active;

    public function __construct(string $name, bool $active)
    {
        $this->name = $name;
        $this->active = $active;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}
