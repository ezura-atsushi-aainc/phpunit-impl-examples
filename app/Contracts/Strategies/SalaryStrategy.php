<?php

namespace App\Contract\Strategies;

use App\Entities\Salary;
use App\Entities\Employee;

interface SalaryStrategy
{
    public function earn(Employee $employee): Salary;
}
