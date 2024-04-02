<?php

namespace App\ValueObjects;

final class Grade
{
    public const S = 1;
    public const A = 2;
    public const B = 3;
    public const C = 4;

    /** @var int */
    private $grade;

    public function __construct(int $grade)
    {
        $this->grade = $grade;
    }

    public function value(): int
    {
        return $this->grade;
    }
}
