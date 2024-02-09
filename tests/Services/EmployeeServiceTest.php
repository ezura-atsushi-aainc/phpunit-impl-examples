<?php

use App\Entities\Employee;
use App\Enums\BloodType;
use App\Services\EmployeeService;
use App\ValueObjects\Person;
use App\ValueObjects\Profile;
use PHPUnit\Framework\TestCase;

final class EmployeeServiceTest extends TestCase
{
    public function testIsNewhire_Newhire_TrueReturned()
    {
        // $x=new Person("x",1,1);
        // $this->assertTrue(true);
        $service = new EmployeeService();
        $result = $service->isNewhire(new Employee(
            new Person("Letro Taro", 22, BloodType::RH_PLUS_A),
            new Profile("Development", 403, new \DateTime("2023-04-01 09:30:00"))
        ));

        $this->assertTrue($result);
    }
}
