<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{public function stripe()
{
    return view('stripe');
}
    public function payStripe(Request $request)
    {
        $this->validate($request, [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);
        $stripe_obj = new Stripe();
        $stripe = $stripe_obj->setApiKey('sk_test_51M009nCHxrrecZpaAsFzw9oYf3MDtnEFWfY45HnTBGyhpbkG09lQ6xvNXE61rBAE598wiZMXIxOory16DeEwddSz00UoIPq5C4');
        //$stripe = Stripe\Stripe::setApiKey(env(''));
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
