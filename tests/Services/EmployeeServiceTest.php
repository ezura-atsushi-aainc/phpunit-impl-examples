<?php

use App\Entities\Employee;
use App\Enums\BloodType;
use App\Enums\Health;
use App\Services\EmployeeService;
use App\ValueObjects\Person;
use App\ValueObjects\Profile;
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
            new Profile("Development", 403, (new \DateTime()))
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
            new Profile("Development", 403, (new \DateTime()))
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
}
