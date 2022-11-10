<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function Show()
    {
        $order = Order::with("payment","customer")->orderBy('created_at', 'DESC')->get();
       // return $order;

        return view('admin.order.show')->with('order',$order);
    }

    public function orderDetails($id)
    {
        $orderIteams = OrderDetails::with('product')->where('order_id',$id)->get();
       // return $orderIteams;

        return view('admin.order.showOrderDetails')->with('orderIteams',$orderIteams);
    }
    public function orderStatusUpdate($id,$status)
    {
        try {
            Order::where('id', $id)->update([
                'order_status'=> $status
            ]);
            Alert::success('Order Status ! ', " Successfully Updated ");
            return back();
        } catch (Exception $exception) {
            Alert::error('Sorry! ', $exception->getMessage());
            return back();
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
