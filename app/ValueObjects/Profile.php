<?php

namespace App\ValueObjects;

use App\ValueObjects\Grade;
use App\ValueObjects\OrgPosition;

final class Profile
{
    /** @var OrgPosition */
    private $orgPosition;
    /** @var int */
    private $officeNumber;
    /** @var \DateTime */
    private $joined;
    /** @var Grade */
    private $grade;

    public function __construct(OrgPosition $orgPosition, int $officeNumber, \DateTime $joined, Grade $grade)
    {
        $this->orgPosition = $orgPosition;
        $this->officeNumber = $officeNumber;
        $this->joined = $joined;
        $this->grade = $grade;
    }

    public function orgPosition(): OrgPosition
    {
        return $this->orgPosition;
    }

    public function officeNumber(): int
    {
        return $this->officeNumber;
    }

    public function joined(): \DateTime
    {
        return $this->joined;
    }

    public function grade(): Grade
    {
        return $this->grade;
    }
}
