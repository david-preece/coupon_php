<?php

namespace App\Models;

class Coupon
{
    private $brand;
    private $value;
    private $coupon;

    public function __construct(string $brand, string $value, string $coupon)
    {
        $this->brand = $brand;
        $this->value = $value;
        $this->coupon = $coupon;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getCoupon(): string
    {
        return $this->coupon;
    }

    public function toJson(): string
    {
        return json_encode([
            'brand' => $this->getBrand(),
            'value' => $this->getValue(),
            'coupon' => $this->getCoupon(),
        ]);
    }
}