<?php

use PHPUnit\Framework\TestCase;
use App\Helpers\CalcHelper;

final class CalcHelperTest extends TestCase
{
    public function testAdd_TwoIntegers_SumReturned(): void
    {
        $a = 1;
        $b = 2;
        $expected = $a + $b;
        $helper = new CalcHelper();

        $result = $helper->add($a, $b);
        $this->assertSame($result, $expected);
    }
}
