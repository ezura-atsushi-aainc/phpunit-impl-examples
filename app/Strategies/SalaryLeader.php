<?php

namespace App\Strategies;

use App\Entities\Employee;
use App\ValueObjects\Salary;

final class SalaryLeader implements SalaryStrategy
{
    public function earn(Employee $employee): Salary
    {
        $service = SalaryBaseService($employee->grade(), $employee->role());
        $base = $service->getBase();
        $rate = $service->getRate();
        return new Saraly($base * $rate + 20000);
    }
}
