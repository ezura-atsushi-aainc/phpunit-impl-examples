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

    public function __construct(Person $person, Profile $profile)
    {
        $this->person = $person;
        $this->profile = $profile;
    }

    public function getJoinedDate(): \DateTime
    {
        return $this->profile->joined();
    }
}
