<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Show()
    {

        $query = Order:: leftJoin('customers', 'customers.customer_id', '=', 'orders.customer_id')->orderBy('orders.created_at', 'DESC');
        if ($request->customer_phone != null) {
            $query = $query->where('customers.customer_phone', $request['customer_phone']);
        }
        if ($request->order_invoice != null) {
            $query = $query->where('orders.order_invoice', $request['order_invoice']);
        }
        if ($request->is_whole_sale != null) {

            $query = $query->where('orders.is_whole_sale', $request['is_whole_sale']);
        }
        $results = $query->paginate(50);
        /*foreach ($results as $product) {
            $status = OrderStatus::where('order_item_id', $product->order_item_id)
                ->orderBy('id', 'DESC')->first();
            if (is_null($status)) {
                $product->status = "Pending";
            } else {
                $product->status = getDeliveryStatus($status->delivery_status);
            }
            $product->commission = ($product->total_price * $product->commission_rate) / 100;
        }*/


        return view('admin.order.show')
            ->with('results', $results);
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
