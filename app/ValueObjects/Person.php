<?php

namespace App\ValueObjects;

use App\Enums\BloodType;

final class Person
{
    /** @var string */
    private $name;
    /** @var int */
    private $age;
    /** @var int */
    private $bloodType;

    public function __construct(string $name, int $age, int $bloodType)
    {
        $this->name = $name;
        $this->age = $age;
        $this->bloodType = $bloodType;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function age(): int
    {
        return $this->age;
    }

    public function bloodType(): int
    {
        return $this->bloodType;
    }
}
