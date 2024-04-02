<?php

namespace App\Services;

use App\ValueObjects\Grade;
use App\ValueObjects\Role;

final class GradeService
{
    private const BASE_BY = [
        Role::PRESIDENT => 1000000,
        Role::MANAGER   => 750000,
        Role::LEADER    => 400000,
        Role::STAFF     => 200000,
    ];

    private const RATE_BY = [
        Grade::S => 2.0,
        Grade::A => 1.5,
        Grade::B => 1.2,
        Grade::C => 1.0,
    ];

    /** @var Grade */
    private $grade;

    public function __construct(Grade $grade, Role $role)
    {
        $this->grade = $grade;
    }

    public function getRate(): float
    {
        return RATE_BY[$this->grade->value()];
    }

    public function getBase(): int
    {
        return BASE_BY[$this->role->value()];
    }
}
