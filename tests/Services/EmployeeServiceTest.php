<?php

use App\Entities\Employee;
use App\Enums\BloodType;
use App\Enums\Health;
use App\Services\EmployeeService;
use App\ValueObjects\Grade;
use App\ValueObjects\OrgPosition;
use App\ValueObjects\Person;
use App\ValueObjects\Profile;
use App\ValueObjects\Role;
use PHPUnit\Framework\TestCase;

final class EmployeeServiceTest extends TestCase
{
    /**
     * @dataProvider necessaryHealthCheckUpAgeProvider
     */
    public function testNeedHealthCheckUp_NecessaryAge_TrueReturned(int $necessaryAge)
    {
        $service = new EmployeeService();
        $result = $service->needMedicalCheckUp(new Employee(
            new Person("Letro Taro", $necessaryAge, BloodType::RH_PLUS_A),
            new Profile(new OrgPosition("Personel", Role::LEADER), 403, new \DateTime(), new Grade(Grade::A))
        ));

        $this->assertTrue($result);
    }

    public function necessaryHealthCheckUpAgeProvider(): array
    {
        return [
            [Health::AGE_NEED_HEALTH_CHECK_UP],
            [Health::AGE_NEED_HEALTH_CHECK_UP + 1],
            [Employee::RETIREMENT_AGE],
        ];
    }

    /**
     * @dataProvider unnecessaryHealthCheckUpAgeProvider
     */
    public function testNeedHealthCheckUp_UnnecessaryAge_FalseReturned(int $unnecessaryAge)
    {
        $service = new EmployeeService();
        $result = $service->needMedicalCheckUp(new Employee(
            new Person("Letro Taro", $unnecessaryAge, BloodType::RH_PLUS_A),
            new Profile(new OrgPosition("Personel", Role::LEADER), 403, new \DateTime(), new Grade(Grade::A))
        ));

        $this->assertFalse($result);
    }

    public function unnecessaryHealthCheckUpAgeProvider(): array
    {
        return [
            [Health::AGE_NEED_HEALTH_CHECK_UP - 1],
            [0],
        ];
    }

    /**
     * @dataProvider employeeListOnlyLeaderAliceProvider
     *
     * @return void
     */
    public function testGetLeaderName_DepartmentHasALeader_LeaderNameReturned(array $employeeList): void
    {
        $service = new EmployeeService();
        $result = $service->getLeaderName("Software Development", $employeeList);

        $this->assertSame("Alice", $result);
    }

    public function employeeListOnlyLeaderAliceProvider(): array
    {
        $employees = [
            ["Tom",   23, BloodType::RH_PLUS_A,  "Software Development", Role::STAFF,  403, "2022-04-01", new Grade(Grade::C)],
            ["Nancy", 22, BloodType::RH_PLUS_O,  "Software Development", Role::STAFF,  403, "2023-04-01", new Grade(Grade::C)],
            ["Alice", 31, BloodType::RH_PLUS_B,  "Software Development", Role::LEADER, 403, "2019-12-05", new Grade(Grade::C)],
            ["Bob",   27, BloodType::RH_PLUS_AB, "Software Development", Role::STAFF,  403, "2020-09-16", new Grade(Grade::C)],
        ];
        return $this->createEmployeeList($employees);
    }

    /**
     * @dataProvider employeeListInAllMemberProvider
     *
     * @return void
     */
    public function testGetLeaderName_DepartmentHasNoLeader_NullReturned(array $employeeList): void
    {
        $service = new EmployeeService();
        $result = $service->getLeaderName("Software Development", $employeeList);

        $this->assertNull($result);
    }

    public function employeeListInAllMemberProvider(): array
    {
        $employees = [
            ["Tom",   23, BloodType::RH_PLUS_A,  "Software Development", Role::STAFF, 403, "2022-04-01", new Grade(Grade::C)],
            ["Nancy", 22, BloodType::RH_PLUS_O,  "Software Development", Role::STAFF, 403, "2023-04-01", new Grade(Grade::C)],
            ["Alice", 31, BloodType::RH_PLUS_B,  "Software Development", Role::STAFF, 403, "2019-12-05", new Grade(Grade::C)],
            ["Bob",   27, BloodType::RH_PLUS_AB, "Software Development", Role::STAFF, 403, "2020-09-16", new Grade(Grade::C)],
        ];
        return $this->createEmployeeList($employees);
    }

    private function createEmployeeList(array $employees): array
    {
        $employeeList = [];
        foreach ($employees as $employee) {
            $employeeList[] = new Employee(
                new Person($employee[0], $employee[1], $employee[2]),
                new Profile(new OrgPosition($employee[3], $employee[4]), $employee[5], new \DateTime($employee[6]), $employee[7])
            );
        }
        return [
            [
                $employeeList,
            ],
        ];
    }
}
