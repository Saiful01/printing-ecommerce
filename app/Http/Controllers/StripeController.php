<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Symfony\Component\Console\Input\Input;

class StripeController extends Controller
{public function stripe()
{
    return view('stripe');
}
    public function payStripe(Request $request)
    {
     // return $request->all();
        $this->validate($request, [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);
        $stripe_obj = new Stripe();
        $stripe = $stripe_obj->setApiKey('sk_test_51M009nCHxrrecZpaAsFzw9oYf3MDtnEFWfY45HnTBGyhpbkG09lQ6xvNXE61rBAE598wiZMXIxOory16DeEwddSz00UoIPq5C4');
        //$stripe = Stripe\Stripe::setApiKey(env(''));

       foreach ($request['order_data'] as $item) {
           return $item;

            $order_item = ([
                'total_print_item' => $item['total_item'],
                'subTotal_price' => $item['totalPriceCountAll'],
                'discount' => $item['discount'],
                /*'coupon' => $item['coupon'],*/
                'totalPriceWithDiscount' => 'totalPriceWithDiscount',
                'quantity' => $item['quantity'],
            ]);
            return $order_item;
        }
        try {
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year"  => $request->input('expiry_year'),
                    "cvc"       => $request->input('cvv')
                )));
            if (!isset($response['id'])) {
                return redirect()->route('/bill/pay');
            }
            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'USD',
                'amount' =>  2 * 100,
                'description' => 'wallet',
            ]);

            if($charge['status'] == 'succeeded') {
                return $request->all();
                return redirect('/')->with('success', 'Payment Success!');

            } else {
                return redirect('/')->with('error', 'something went to wrong.');
            }

        }
        catch (Exception $e) {
            return $e->getMessage();
        }

    }
}
