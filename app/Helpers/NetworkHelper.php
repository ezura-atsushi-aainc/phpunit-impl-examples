<?php

namespace App\Helpers;

use App\ValueObjects\IPAddress;

final class NetworkHelper
{
    public function isLoopbackAddress(IPAddress $ipAddr): bool
    {
        $octets = $ipAddr->octets();
        return $octets[0] === 127 && $octets[1] === 0 && $octets[2] === 0 && $octets[3] === 1;
    }
}
