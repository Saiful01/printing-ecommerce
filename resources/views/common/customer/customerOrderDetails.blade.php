@extends('layouts.common')
@section('title', 'Order History Page')
@section('content')

    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>My account</span></li>
                    <li><span>Order Details</span></li>
                </ul>
            </div>
        </div>
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 aside aside--left">
                        <div class="list-group">
                            <a href="/customer/order/history" class="list-group-item active">My Order History</a>
                            <a href="/customer/logout" class="list-group-item">Logout</a>
                        </div>
                    </div>
                    <div class="col-md-13 aside">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-order-history">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Short Details</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Size Details</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($orderItems as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><b>{{$item->product->title}}</b></td>
                                        <td>{{$item->product->short_details}}</td>
                                        <td>{{$item->product->details}}</td>
                                        {{--@if($item->productis_public ==1)
                                            <td><img src="{{$item->product->featured_image}}" width="80px"></td>
                                        @endif--}}
                                        <td class="institute"><img src="{{$item->product->featured_image}}" width="80px"/></td>
                                        <td>{{$item->size}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>${{$item->price}}</td>
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
