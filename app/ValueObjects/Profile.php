<?php

namespace App\ValueObjects;

final class Profile
{
    /** @var string */
    private $division;
    /** @var int */
    private $officeNumber;
    /** @var \DateTime */
    private $joined;

    public function __construct(string $division, int $officeNumber, \DateTime $joined)
    {
        $this->division = $division;
        $this->officeNumber = $officeNumber;
        $this->joined = $joined;
    }

    public function division(): string
    {
        return $this->division;
    }

    public function officeNumber(): int
    {
        return $this->officeNumber;
    }

    public function joined(): \DateTime
    {
        return $this->joined;
    }
}
