<?php

namespace App\Services;

use App\Entities\Employee;

final class EmployeeService
{
    public function isNewhire(Employee $employee)
    {
        return $employee->getJoinedDate() > (new \DateTime())->modify("-1 year");
    }
}
