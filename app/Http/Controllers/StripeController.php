<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function payStripe(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);

        $stripe_price = getIntDecimalValue($request['sub_total']);

        $orders = ([
            'customer_id' => Auth::guard('customer')->user()->id,
            'invoice' => uniqid(),
            'total_price' => $request['total_price'],
            'discount_price' => $request['discount_price'],
            'billingAddress' => $request['billingAddress'],
            'Shipping_charge' => $request['Shipping_charge'],
            'sub_price' => $request['sub_total'],

        ]);
       // return $orders;
        $order_id = Order::insertGetId($orders);

        foreach (json_decode($request->products, true) as $item) {

            // return $item;

            $order_item = ([
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'size' => $item['size'],
                'quantity' => $item['quantity'],
            ]);
            OrderDetails::create($order_item);
        }
        $stripe_obj = new Stripe();
        $stripe = $stripe_obj->setApiKey('sk_test_51M009nCHxrrecZpaAsFzw9oYf3MDtnEFWfY45HnTBGyhpbkG09lQ6xvNXE61rBAE598wiZMXIxOory16DeEwddSz00UoIPq5C4');

        ## Step1: Create Token ##
        try {
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number" => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year" => $request->input('expiry_year'),
                    "cvc" => $request->input('cvv'),

                )));

        } catch (\Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return redirect()->back();
        }

        ## Step2: Payment Start ##
        try {
            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'USD',
                'amount' => $stripe_price,
                'description' => 'wallet',
            ]);

            if ($charge['status'] == 'succeeded') {
                $status=true;
            }else{
                $status=false;
            }

            ## Step2: Update Payment status ##
            Order::where('id', $order_id)->update([
                'is_paid' => $status,
            ]);


            $payment = ([
                'order_id' => $order_id,
                'payment_amount' => $request['sub_total'],
                'details'=>json_encode($charge),
            ]);
            Payment::create($payment);

            Alert::success('Order', " Payment Successfully Done");
            //return $request->all();
            return redirect('/customer/order/history')->with('success', 'Payment Success!');

        } catch (\Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return redirect()->back();
        }

    }
}
