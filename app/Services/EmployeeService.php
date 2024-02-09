<?php

namespace App\Services;

use App\Entities\Employee;
use App\Enums\Health;

final class EmployeeService
{
    public function needMedicalCheckUp(Employee $employee)
    {
        return $employee->getAge() >= Health::AGE_NEED_HEALTH_CHECK_UP;
    }
}
