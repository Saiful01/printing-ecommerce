@extends('layouts.common')
@section('title', 'Order History Page')
@section('content')

    <div class="page-content" ng-controller="printingCartController">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>Shopping Cart</span></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Billing Address
                        </div>
                        <div class="card-body">
                            <form class="new_address"  action="/customer/address/store" accept-charset="UTF-8" method="post">
                               @csrf
                                <div class="form-group">
                                    <label for="address_company">Company (Optional)</label>
                                    <input class="form-control" placeholder="Company" type="text" name="company" id="company">
                                </div>
                                <div class="form-group">
                                    <label for="address_address">Address 1</label>
                                    <input class="form-control" placeholder="Address 1" required="required" type="text" name="address">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address_address">Address 2 (Optional)</label>
                                        <input class="form-control" placeholder="Address 2" type="text" name="address2">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address_phone">Phone</label>
                                        <input class="form-control" placeholder="Phone" required="required" type="text" name="phone">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="address_city">City</label>
                                        <input class="form-control" placeholder="City" required="required" type="text" name="city">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="address_state">State</label>

                                        <input class="form-control" placeholder="City" required="required" type="text" name="state">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="address_zipcode">Zip Code</label>
                                        <input class="form-control" placeholder="Zip Code" required="required" type="text" name="zipCode">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save And Continue</button>
                            </form>
                        </div>
                    </div>
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
                                    Subtotal: <span class="float-right"><strong>$@{{ totalPriceCountAll }}</strong></span>
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
                                    <strong>Subtotal: <span class="float-right">$@{{ totalPriceCountAll }}</span></strong>
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
                                    <a class="btn btn-lg btn-success" href="/customer/address"><i
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