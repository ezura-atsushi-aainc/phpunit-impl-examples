<?php

namespace App\Entities;

use App\ValueObjects\Grade;
use App\ValueObjects\OrgPosition;
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

    public function getName(): string
    {
        return $this->person->name();
    }

    public function getOrgPosition(): OrgPosition
    {
        return $this->profile->orgPosition();
    }

    public function getGrade(): Garde
    {
        return $this->profile->grade();
    }
}
