<?php

use App\Entities\Employee;
use App\Enums\BloodType;
use App\Enums\Health;
use App\Factories\SalaryFactory;
use App\Services\EmployeeService;
use App\Services\SalaryService;
use App\ValueObjects\Grade;
use App\ValueObjects\OrgPosition;
use App\ValueObjects\Person;
use App\ValueObjects\Profile;
use App\ValueObjects\Role;
use App\ValueObjects\Salary;
use PHPUnit\Framework\TestCase;

final class SalaryServiceTest extends TestCase
{
    // /**
    //  * @dataProvider dataProvider
    //  *
    //  * @return void
    //  */
    // public function testEarn_GetPresidentSalary_SalaryReturned(array $roleAndGrade, array $expected): void
    // {
    //     $service = new EmployeeService();
    //     $result = $service->needMedicalCheckUp(new Employee(
    //         new Person("Letro Taro", $necessaryAge, BloodType::RH_PLUS_A),
    //         new Profile(new OrgPosition("Personel", $roleAndGrade[0]), 403, new \DateTime(), new Grade($roleAndGrade[1]))
    //     ));
    //
    //
    //
    //
    //
    //     $this->assertNull($result);
    // }
    //
    // public function dataProvider(): array
    // {
    //     return [
    //         [
    //             [Role::PRESIDENT, Grade::S],
    //             [new Saraly($base * ($rate + 0.5) + 500000)],
    //         ],
    //     ];
    // }
}
