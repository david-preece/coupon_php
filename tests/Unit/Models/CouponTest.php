<?php

namespace CouponApp\Tests;

use App\Models\Coupon;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\ConsoleOutput;

class CouponTest extends TestCase
{
    public function test_should_return_value()
    {
        $coupon = new Coupon('', 'test value', '');

        $this->assertEquals($coupon->getValue(), 'test value');
    }

    public function test_should_return_brand()
    {
        $coupon = new Coupon('test brand', '', '');

        $this->assertEquals('test brand', $coupon->getBrand());
    }

    public function test_should_return_coupon()
    {
        $coupon = new Coupon('', '', 'test-coup-on00-0000');

        $this->assertEquals('test-coup-on00-0000', $coupon->getCoupon());
    }

    public function test_should_return_json_when_toJson_is_called()
    {
        $coupon = new Coupon('test brand', '100', 'test-coup-on00-0000');
        $expected = json_encode([
            'brand' => 'test brand',
            'value' => '100',
            'coupon' => 'test-coup-on00-0000',
        ]);
        $this->assertEquals($expected, $coupon->toJson());
    }
}