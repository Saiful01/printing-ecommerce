@extends('layouts.common')
@section('title', 'Order History Page')
@section('content')

    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>My account</span></li>
                    <li><span>Order History</span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 aside aside--left">
                        <div class="list-group">
                            <a href="/customer/order/history" class="list-group-item active">My Order History</a>
                            <a href="/customer/logout" class="list-group-item">Logout</a>
                        </div>
                    </div>
                    <div class="col-md-12 aside">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-order-history">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Order Number</th>
                                    {{--<th scope="col">Order Details</th>--}}
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Subtotal Price</th>
                                    <th scope="col">Order Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($order as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><b>{{$item->invoice}}</b></td>
                                        {{--<td><a href="cart.html" class="ml-1">View Details</a></td>--}}
                                        <td>{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                                        @if($item->is_paid ==1)
                                            <td><span class="badge badge-success">Paid</span></td>
                                        @else
                                            <td><span class="badge badge-danger">Unpaid</span></td>
                                        @endif
                                        <td>${{$item->total_price}}</td>
                                        <td>${{$item->discount_price}}</td>
                                        <td><span class="color">${{$item->sub_price}}</span></td>
                                        <td><a href="/customer/orders-detail/{{$item->id}}" class="btn btn--grey btn--sm">Details</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
