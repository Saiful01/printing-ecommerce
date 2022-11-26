<?php

namespace App\Http\Controllers;


use App\Models\Coupon;
use App\Models\CouponUsed;
use App\Models\CustomPrint;
use App\Models\Tax;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function customPosterPrice(Request $request)
    {

        //return $request->all();
        $is_exist = CustomPrint::where('min', '<=', $request['total_area'])->where('max', '>=', $request['total_area'])->first();
        if (is_null($is_exist)) {
            return 0;
        } else {

            if ($request['paper_type'] == 1) {
                return $is_exist->photo_premium_glossy*$request['total_area'];
            } elseif ($request['paper_type'] == 2) {
                return $is_exist->canvas*$request['total_area'];
            } elseif ($request['paper_type'] == 3) {
                return $is_exist->banner*$request['total_area'];
            } else {
                return $is_exist->self_adhesive*$request['total_area'];
            }
        }


    }
}
