<?php

namespace Tests\Unit\Http\Requests;

use App\Http\Requests\CouponRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class CouponRequestTest extends TestCase
{
    public function test_should_return_coupon_string_from_api()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], json_encode(['data' => 'fake-coupon'])),
        ]);

        $handler = HandlerStack::create($mockHandler);
        $client = new Client(['handler' => $handler]);

        $couponRequest = new CouponRequest($client, 'http://localhost', 8080);

        $this->assertEquals('fake-coupon', $couponRequest->requestCoupon());
    }
}