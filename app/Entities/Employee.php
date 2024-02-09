<?php

namespace App\Entities;

use App\ValueObjects\Person;
use App\ValueObjects\Profile;

final class Employee
{
    /** @var Person */
    private $person;
    /** @var Profile */
    private $profile;

    public const RETIREMENT_AGE = 60;

    public function __construct(Person $person, Profile $profile)
    {
        $this->person = $person;
        $this->profile = $profile;
    }

    public function getAge(): int
    {
        return $this->person->age();
    }
}
