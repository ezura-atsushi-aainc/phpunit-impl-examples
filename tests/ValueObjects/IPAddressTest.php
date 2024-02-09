<?php

use PHPUnit\Framework\TestCase;
use App\ValueObjects\IPAddress;

final class IPAddressTest extends TestCase
{
    /**
     * @dataProvider validIPv4AddressProvider
     */
    public function testToString_InitializeIPv4AddressLiteral_ReturnSameIPv4AddressLiteral(string $origin, string $expected): void
    {
        $valueObject = new IPAddress($origin);

        $result = $valueObject->toString();
        $this->assertSame($result, $origin);
    }

    public function validIPv4AddressProvider(): array
    {
        return [
            ["0.0.0.0", "0.0.0.0"],
            ["1.2.3.4", "1.2.3.4"],
            ["8.8.8.8", "8.8.8.8"],
            ["127.0.0.1", "127.0.0.1"],
            ["172.16.0.0", "172.16.0.0"],
            ["192.168.255.255", "192.168.255.255"],
            ["255.255.255.255", "255.255.255.255"],
        ];
    }

    /**
     * @dataProvider invalidIPv4AddressProvider
     */
    public function testConstruct_InvalidIPv4AddressLiteral_ThrowedException(string $origin): void
    {
        $this->expectException(\Exception::class);
        new IPAddress($origin);
    }

    public function invalidIPv4AddressProvider(): array
    {
        return [
            ["0.0.0.-1"],
            ["127.0.0.300"],
            ["253.254.255.256"],
        ];
    }
}
