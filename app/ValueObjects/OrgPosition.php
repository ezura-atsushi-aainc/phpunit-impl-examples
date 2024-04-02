<?php

namespace App\ValueObjects;

final class OrgPosition
{
    /** @var string */
    private $department;
    /** @var int */
    private $role;

    public function __construct(string $department, int $role)
    {
        $this->department = $department;
        $this->role = $role;
    }

    public function department(): string
    {
        return $this->department;
    }

    public function role(): int
    {
        return $this->role;
    }
}
