<?php

namespace App\Services;

use App\Entities\Employee;
use App\Enums\Health;
use App\ValueObjects\Role;

final class EmployeeService
{
    public function needMedicalCheckUp(Employee $employee)
    {
        return $employee->getAge() >= Health::AGE_NEED_HEALTH_CHECK_UP;
    }

    public function getLeaderName(string $department, array $employeeList): ?string
    {
        $employees = array_filter($employeeList, function ($employee) {
            return $employee instanceof Employee;
        });

        $filteredEmployees = array_filter($employees, function ($employee) use ($department) {
            return $employee->getOrgPosition()->department() === $department;
        });

        $leaderOfDepartment = array_filter($filteredEmployees, function ($employee) {
            return $employee->getOrgPosition()->role() === Role::LEADER;
        });

        if (count($leaderOfDepartment) === 0) {
            return null;
        }
        return array_pop(array_values($leaderOfDepartment))->getName();
    }
}
