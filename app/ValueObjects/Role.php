<?php

namespace App\ValueObjects;

final class Role
{
    public const PRESIDENT = 1;
    public const MANAGER   = 2;
    public const LEADER    = 3;
    public const STAFF     = 4;

    /** @var int */
    private $role;

    public function __construct(int $role)
    {
        $this->role = $role;
    }

    public function value(): int
    {
        return $this->role;
    }
}
