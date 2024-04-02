<?php

namespace App\Services;

use App\Factories\SalaryFactory;
use App\ValueObjects\Salary;

final class SalaryService
{
    /** @var SalaryStrategy */
    private $salaryStrategy;

    public function __construct(SalaryStrategy $salaryStrategy)
    {
        $this->salaryStrategy = $salaryStrategy;
    }

    public function earn(Employee $employee): Salary
    {
        return $salaryStrategy->earn($employee);
    }
}
