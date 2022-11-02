@extends('layouts.common')
@section('title', 'Order History Page')
@section('content')

    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>cart</span></li>
                    <li><span>Shipping Address</span></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="new_order" id="new_order" action="/orders" accept-charset="UTF-8" method="post">
                        <div class="row mb-4">
                            <div class="col-md-18">
                                <div class="card">
                                    <div class="card-header">
                                        Select A Billing Address
                                    </div>
                                    <div class="card-body row justify-content-around">
                                        <select class="form-control col-md-9" name="order[billing_address]"
                                                id="order_billing_address">
                                            {{--@foreach($devices as $device)
                                                <option value="{{ old('device', $device->name) }}">{{ old('device', $device->name) }}</option>


                                            @endforeach--}}
                                            <option value="218283" class="form-control">a a - a - a</option>
                                            <option value="218283" class="form-control">a a - a - a</option>
                                            <option value="218283" class="form-control">a a - a - a</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-18">
                                <div class="card">
                                    <div class="card-header">
                                        Select A Shipping Address
                                    </div>
                                    <div class="card-body row justify-content-around">
                                        <select class="form-control col-md-9" name="order[shipping_address]"
                                                id="order_shipping_address">
                                            <option value="218283" class="form-control">a a - a - a</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <input type="submit" name="commit" value="Continue" class="btn btn-lg btn-success"
                                       data-disable-with="Please wait...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">Cart Summary</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Prints: <span class="float-right">1</span>
                                </li>
                                <li class="list-group-item">
                                    Subtotal: <span class="float-right"><strong>$18.99</strong></span>
                                </li>
                                <li class="list-group-item">
                                    <form action="/carts/add_coupon" method="get">
                                        <div class="input-group add_promo float-right">
                                            <input type="text" name="cart[coupon]" class="form-control rounded-0"
                                                   id="validationDefaultUsername" placeholder="Enter Promo Code"
                                                   aria-describedby="inputGroupPrepend2" required="">
                                            <div class="input-group-prepend">
                                                <input type="submit" value="Add"
                                                       class="btn btn-primary btn-sm rounded-0"
                                                       id="inputGroupPrepend2">
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li class="list-group-item">
                                    <strong>Subtotal: <span class="float-right">$18.99</span></strong>
                                </li>
                                <li class="list-group-item text-center">
                                    If you order your prints before 2 pm EST, your files will be printed and shipped
                                    in the
                                    same day
                                    <br><small>For rolled poster prints only.</small>
                                </li>
                                <!--li class="list-group-item text-center">
                                   Order in 7 hours and 6 minutes and we will SHIP OUT TODAY!
                                   <br><small>For rolled poster prints only.</small>
                                   </li-->
                                {{--<li class="list-group-item text-center">
                                    <a class="btn btn-lg btn-success" href="#"><i
                                            class="fas fa-shopping-cart"></i> SECURE CHECKOUT</a>
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
