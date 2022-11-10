<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe\Stripe;
use Symfony\Component\Console\Input\Input;

class StripeController extends Controller
{public function stripe()
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

        $request['sub_total']=getIntDecimalValue($request['sub_total']);

         $orders = ([
            'customer_id' => Auth::guard('customer')->user()->id,
            'invoice' => uniqid(),
            'total_price' => $request['total_price'],
            'discount_price' => $request['discount_price'],
            'sub_price' => $request['sub_total'],

        ]);
        $order_id= Order::insertGetId($orders);

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
        //$stripe = Stripe\Stripe::setApiKey(env(''));
        try {
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year"  => $request->input('expiry_year'),
                    "cvc"       => $request->input('cvv'),

                )));
            if (!isset($response['id'])) {
                return redirect()->route('/bill/pay');
            }
            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'USD',
                'amount' =>  $request['sub_total'],
                'description' => 'wallet',
            ]);

            if($charge['status'] == 'succeeded') {
                Order::where('id',$order_id)->update([
                    'is_paid'=>true
                ]);
                $payment = ([
                    'order_id' => $order_id,
                    'payment_amount' => $request['sub_total'],

                ]);
                Payment::create($payment);

                Alert::success('Cart', " Payment Successfully Done");
                //return $request->all();
                return redirect('/customer/order/history')->with('success', 'Payment Success!');

            } else {
                return redirect()->back()->with('error', 'something went to wrong.');
            }

        }
        catch (Exception $e) {
            return $e->getMessage();
        }

    }
}
