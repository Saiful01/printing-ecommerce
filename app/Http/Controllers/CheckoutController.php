<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Enter Your Stripe Secret
        /*$stripe_obj = new Stripe();
        $stripe = $stripe_obj->setApiKey('sk_test_51M009nCHxrrecZpaAsFzw9oYf3MDtnEFWfY45HnTBGyhpbkG09lQ6xvNXE61rBAE598wiZMXIxOory16DeEwddSz00UoIPq5C4');*/

        \Stripe\Stripe::setApiKey('sk_test_51M009nCHxrrecZpaAsFzw9oYf3MDtnEFWfY45HnTBGyhpbkG09lQ6xvNXE61rBAE598wiZMXIxOory16DeEwddSz00UoIPq5C4');


        $amount = 30 * 20;
        /*$amount *= 100;
        $amount = (int)$amount;*/

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'USD',
            'description' => 'Payment From All About Laravel',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        return view('checkout.credit-card', compact('intent'));

    }

    public function afterPayment()
    {
        echo 'Payment Received, Thanks you for using our services.';
    }
}
