<?php

namespace App\Http\Controllers;


use App\Models\Coupon;
use App\Models\CouponUsed;
use App\Models\Tax;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WebApiController extends Controller
{

    public function getStates($country_id)
    {


    }

    public function getTaxFee()
    {
        return Tax::where('id', 1)->first()->amount;

    }

    public function couponSave(Request $request)
    {

        $exist = Coupon::where('coupon', $request['coupon'])->where('is_active', true)->whereDate('expiration_date', '>', Carbon::now())->first();
        if ($exist != null) {
            $offer_exist = CouponUsed::where('coupon_id', $exist->id)->where('customer_id', Auth::guard('customer')->user()->id)->where('is_used', true)->first();
            if ($offer_exist == null) {
                $array = [
                    'customer_id' => Auth::guard('customer')->user()->id,
                    'coupon_id' => $exist->id,
                    'is_used' => true,
                ];
                try {
                    CouponUsed::create($array);
                    return [
                        'status_code' => 200,
                        'message' => "SuccessFully Added Your Coupon",
                        'all_data' => $request->all(),
                        'discount' => $exist->discount,

                    ];
                } catch (\Exception $exception) {
                    return [
                        'status_code' => 400,
                        'message' => $exception->getMessage(),

                    ];

                }
            } else {
                return [
                    'status_code' => 400,
                    'message' => "You already used this coupon",

                ];

            }


        } else {
            return [
                'status_code' => 400,
                'message' => "Invalid Coupon",

            ];

        }

    }
}
