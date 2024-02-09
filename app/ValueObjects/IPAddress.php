<?php

namespace App\ValueObjects;

use \Exception;

final class IPAddress
{
    private $octets = [];

    public function __construct(string $ipAddr)
    {
        foreach (explode(".", $ipAddr) as $octet) {
            if (!is_numeric($octet)) {
                throw new Exception("Invalid IPv4 address literal.");
            }
            $octetValue = (int)$octet;
            if ($octetValue < 0 || $octetValue > 255) {
                throw new Exception("An octet must have a value between 0 and 255.");
            }
            array_push($this->octets, $octetValue);
        }
        if (count($this->octets) != 4) {
            throw new Exception("IPv4 address just have to have 4 octets.");
        }
    }

    public function octets(): array
    {
        return $this->octets;
    }

    public function toString(): string
    {
        return implode(".", $this->octets);
    }
}
