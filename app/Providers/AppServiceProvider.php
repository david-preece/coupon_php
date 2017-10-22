<?php

namespace App\Providers;

use App\Http\Requests\CouponRequest;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CouponRequest::class, function () {
            $client = new Client();
            return new CouponRequest($client, config('app.coupon_api_url'));
        });
    }
}
