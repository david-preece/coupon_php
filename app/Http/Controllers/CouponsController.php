<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    private $request;

    public function __construct(CouponRequest $request)
    {
        $this->request = $request;
    }

    public function index(Request $request)
    {
        if ($request->has('brand')) {
            $brand = $request->input('brand');
        }

        if ($request->has('value')) {
            $value = (float) $request->input('value');
        }

        if ($request->has('limit')) {
            $limit = (int) $request->input('limit');
        }

        try {
            $requestCoupon = $this->request->requestCoupon();
        } catch (RequestException $exception) {
            abort(500, 'Unable to get coupon. Error: ' . $exception->getMessage());
        }

        $coupon = new Coupon($requestCoupon->brand, $requestCoupon->value, $requestCoupon->coupon);

        return $coupon->toJson();
    }
}
