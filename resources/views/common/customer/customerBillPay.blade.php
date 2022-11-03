@extends('layouts.common')
@section('title', 'Order History Page')
@section('content')

    <div class="page-content" ng-controller="printingCartController">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>cart</span></li>
                    <li><span>Shipping & Pay</span></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="new_order" id="new_order" action="/customer/bill/pay" accept-charset="UTF-8" method="post">
                        <div class="row mb-4">
                            <div class="col-md-18">
                                <div class="card">
                                    <div class="card-header">
                                        Select A Billing & Shipping Address
                                        <span class="float-right"><a href="/customer/address">Edit/Change</a></span>
                                        @csrf

                                    </div>
                                    <div class="card-body row justify-content-around">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="billingAddress" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                {{$result->customerAddress->address}}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="billingAddress" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                {{$result->customerAddress->address2}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-18">
                                <div class="card">
                                    <div class="card-header">Select Delivery Option</div>
                                    <div class="card-body row">
                                        <div class="col-md-4 text-center delivery_option selected_delivery"
                                             id="delivery_option_1">
                                            <div onclick="update_delivery(1, 8.99);">
                                                <p><strong>USPS 3-10 Days</strong></p>
                                                <h3>$8.99</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center delivery_option " id="delivery_option_2">
                                            <div onclick="update_delivery(2, 12.99);">
                                                <p><strong>Ground 2-5 Days</strong></p>
                                                <h3>$12.99</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center delivery_option " id="delivery_option_3">
                                            <div onclick="update_delivery(3, 32.99);">
                                                <p><strong>Express 1-2 Days</strong></p>
                                                <h3>$32.99</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Continue</button>
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
                                    Subtotal: <span
                                        class="float-right"><strong>$@{{ totalPriceCountAll }}</strong></span>
                                </li>
                                <li class="list-group-item">
                                    <form action="/carts/add_coupon" method="get">
                                        <div class="input-group add_promo float-right">
                                            <input type="text" name="cart[coupon]" class="form-control rounded-0"
                                                   id="validationDefaultUsername" placeholder="Enter Promo Code"
                                                   aria-describedby="inputGroupPrepend2" required="">
                                            <div class="input-group-prepend">
                                                <input type="submit" value="Add"
                                                       class="btn btn-primary btn-sm rounded-0" id="inputGroupPrepend2">
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li class="list-group-item">
                                    <strong>Subtotal: <span
                                            class="float-right">$@{{ totalPriceCountAll }}</span></strong>
                                </li>

                                <li class="list-group-item text-center">
                                    If you order your prints before 2 pm EST, your files will be printed and shipped
                                    in the
                                    same day
                                    <br><small>For rolled poster prints only.</small>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
