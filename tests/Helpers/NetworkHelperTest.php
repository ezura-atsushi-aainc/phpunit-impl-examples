<?php

use App\Helpers\NetworkHelper;
use App\ValueObjects\IPAddress;
use PHPUnit\Framework\TestCase;

final class NetworkHelperTest extends TestCase
{
    public function testIsLoopbackAddress_SetLoopbackAddress_TrueReturned(): void
    {
        $loopbackAddress = "127.0.0.1";
        $helper = new NetworkHelper();

        $this->assertSame(true, $helper->isLoopbackAddress(new IPAddress($loopbackAddress)));
    }
}
