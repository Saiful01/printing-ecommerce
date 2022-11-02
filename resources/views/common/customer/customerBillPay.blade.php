@extends('layouts.common')
@section('title', 'Order History Page')
@section('content')

    <div class="page-content">
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
                    <form id="update_address" style="display:none;" class="edit_order" action="#"
                          accept-charset="UTF-8" method="post">
                        <input name="utf8" type="hidden" value="✓"><input type="hidden" name="_method"
                                                                          value="patch"><input type="hidden"
                                                                                               name="authenticity_token"
                                                                                               value="cOCY4yHVGpk1PnN6HTS25ijhyuRhVjAiHf5d74hY2LHlheM2kHOfYwy0LahSEjKe46/qtbFhFdnjteBeK4tHWQ==">
                        <div class="row mb-4" id="address_billing">
                            <div class="col-18">
                                <div class="card">
                                    <div class="card-header">
                                        Select A Billing Address
                                    </div>
                                    <div class="card-body row justify-content-around">
                                        <select class="form-control col-md-9" name="order[billing_address]"
                                                id="order_billing_address">
                                            <option selected="selected" value="218283">a a - a - a</option>
                                        </select>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-link col-md-2"
                                           data-toggle="modal" data-target="#new_address_modal"><i
                                                class="fa fa-plus"></i>
                                            New Address</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4" id="address_shipping">
                            <div class="col-18">
                                <div class="card">
                                    <div class="card-header">
                                        Select A Shipping Address
                                    </div>
                                    <div class="card-body row justify-content-around">
                                        <select class="form-control col-md-9" name="order[shipping_address]"
                                                id="order_shipping_address">
                                            <option selected="selected" value="218283">a a - a - a</option>
                                        </select>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-link col-md-2"
                                           data-toggle="modal" data-target="#new_address_modal"><i
                                                class="fa fa-plus"></i>
                                            New Address</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-18">
                                <a href="javascript:void(0);" onclick="edit_address('cancel');" class="btn btn-link">Cancel</a>
                                <input type="submit" name="commit" value="Update Address Information"
                                       class="btn btn-success float-right" data-disable-with="Please wait...">
                            </div>
                        </div>
                    </form>
                    <form id="update_delivery" class="edit_order" action="#" accept-charset="UTF-8"
                          method="post">
                        <input name="utf8" type="hidden" value="✓"><input type="hidden" name="_method"
                                                                          value="patch"><input type="hidden"
                                                                                               name="authenticity_token"
                                                                                               value="cOCY4yHVGpk1PnN6HTS25ijhyuRhVjAiHf5d74hY2LHlheM2kHOfYwy0LahSEjKe46/qtbFhFdnjteBeK4tHWQ==">
                        <input value="1" type="hidden" name="order[delivery_option_id]" id="order_delivery_option_id">
                        <div class="row mb-4" id="address_preview">
                            <div class="col-18">
                                <div class="card">
                                    <div class="card-header">
                                        Billing &amp; Shipping Address
                                        <span class="float-right"><a href="javascript:void(0);"
                                                                     onclick="edit_address('address');">Edit/Change</a></span>
                                    </div>
                                    <div class="card-body row">
                                        <div class="col-md-9">
                                            a a<br>
                                            a<br>
                                            a, AZ,a
                                        </div>
                                        <div class="col-md-9">
                                            a a<br>
                                            a<br>
                                            a, AZ,a
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
