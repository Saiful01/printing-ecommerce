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
                    <form class="new_order" id="new_order" action="{{url('customer/bill/payment')}}"
                          accept-charset="UTF-8"
                          method="post">
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
                                            <input class="form-check-input" type="radio"
                                                   value="{{$result->customerAddress->address}}" name="billingAddress"
                                                   id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                {{$result->customerAddress->address}}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                   value="{{$result->customerAddress->address2}}" name="billingAddress"
                                                   id="flexRadioDefault2" checked>
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
                                        @foreach($shipping as $ship)
                                            <div class="col-md-4 text-center delivery_option selected_delivery"
                                                 id="delivery_option_1">
                                                {{--<div>
                                                    <p><strong>{{$ship->title}}</strong></p>
                                                    <h3>{{$ship->Shipping_charge}}</h3>
                                                </div>--}}

                                                <div class="form-check" ng-click="changeDeliveryCharge({{$ship->Shipping_charge}})">
                                                    <input class="form-check-input" type="radio" name="shippingPrice"
                                                           value="{{$ship->Shipping_charge}}" id="{{$ship->Shipping_charge}}" checked>
                                                    <label class="form-check-label" for="{{$ship->Shipping_charge}}">
                                                        <p><strong>{{$ship->title}}</strong></p>
                                                        <h3>{{$ship->Shipping_charge}}</h3>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-14">
                                <div class="card">
                                    <div class="card-header">Pay Bill</div>
                                    <div class="card-body row ">
                                        <div class="row">
                                            <div class="col-lg-12 form-group cardBorder">
                                                <label>Number of Card</label>
                                                <input autocomplete="off" class="form-control" size="20" type="text"
                                                       name="card_no">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 form-group">
                                                <label>CVC</label>
                                                <input autocomplete="off" class="form-control" placeholder="ex. 311"
                                                       size="3" type="text" name="cvv">
                                            </div>
                                            <div class="col-lg-4 form-group">
                                                <label>Expiration month</label>
                                                <input class="form-control" placeholder="MM" size="2" type="text"
                                                       name="expiry_month">
                                            </div>
                                            <div class="col-lg-4 form-group">
                                                <label>Expiration year</label>
                                                <input class="form-control" placeholder="YYYY" size="4" type="text"
                                                       name="expiry_year">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="products" value="@{{cart_products}}">
                        <input type="hidden" name="total_price" value="@{{ totalPriceCountAll }}">
                        <input type="hidden" name="discount_price" value="@{{ discount }}">
                        <input type="hidden" name="sub_total" value="@{{ totalPriceWithDiscount }}">
                        <button type="submit" class="btn btn-primary">Pay</button>
                    </form>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">Cart Summary</div>
                        <div class="card-body">

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Prints: <span class="float-right" ng--bind="total_item"></span>
                                </li>
                                <li class="list-group-item">
                                    Total: <span
                                        class="float-right"><strong>$@{{ totalPriceCountAll }}</strong></span>
                                </li>
                                <li class="list-group-item">
                                    Discount: <span
                                        class="float-right"><strong>$@{{ discount }}</strong></span>
                                </li>
                                <li class="list-group-item">
                                    Delivery Charge: <span
                                        class="float-right"><strong>$@{{ delivery_charge }}</strong></span>
                                </li>
                                <li class="list-group-item">
                                    <form action="/carts/add_coupon" method="get">
                                        <div class="input-group add_promo float-right">
                                            <input type="text" name="coupon" class="form-control rounded-0"
                                                   placeholder="Enter Promo Code"
                                                   aria-describedby="inputGroupPrepend2" required="">
                                            <div class="input-group-prepend">
                                                <input type="submit" value="Add"
                                                       class="btn btn-primary btn-sm rounded-0" id="inputGroupPrepend2">
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li class="list-group-item">
                                    <strong>SubTotal: <span
                                            class="float-right">$@{{ totalPriceWithDiscount }}</span></strong>
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

    {{-- <script src="https://js.stripe.com/v3/"></script>--}}
    {{--<script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
                .then(function(result) {
                    console.log(result);
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        console.log(result);
                        form.submit();
                    }
                });
        });
    </script>--}}
@endsection
