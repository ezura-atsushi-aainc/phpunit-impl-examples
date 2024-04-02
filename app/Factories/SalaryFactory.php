<?php

namespace \App\Factories;

use App\Contract\Strategies\SalaryStrategy;
use App\ValueObjects\Role;

final class SalaryFactory
{
    public static function newBy(Role $role): SalaryStrategy
    {
        switch ($role->value()) {
            case Role::PRESIDENT:
                return new SalaryPresident();
            case Role::MANAGER:
                return new SalaryManager();
            case Role::LEADER:
                return new SalaryLeader();
            case Role::STAFF:
                return new SalaryStaff();
        }

        throw new Exception();
    }
}
