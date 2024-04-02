<?php

namespace App\ValueObjects;

final class Salary
{
    /** @var int */
    private $salary;

    public function __construct(int $salary)
    {
        $this->salary = $salary;
    }

    public function salary(): int
    {
        return $this->salary;
    }
}
