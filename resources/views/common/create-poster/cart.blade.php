@extends("layouts.common")
@section("content")

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
                        <div class="card-header">Cart Items</div>
                        <div class="card-body shopping_cart">
                            <!-- CART ITEM - POSTER -->

                            <div class="row mt-1" ng-repeat="item in cart_products">
                                <div class="col-auto">
                                    <img width="110" src="@{{ item.featured_image }}" alt="">
                                </div>
                                <div class="col item_desc p-0">
                                   {{-- <strong>Dimensions:</strong> 36.0 (w) x 24.0 (h)<br>--}}
                                    <strong>Title:</strong> @{{ item.title }}<br>
                                    <strong>Size:</strong>@{{ item.size }}<br>
                                    <strong>Framing:</strong> No Frame<br>
                                </div>
                                <div class="col ">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="quantity">

                                                <input type="button" value="+" class="plus" ng-click="incQty(item)">
                                                <input type="number" name="qty" title="Quantity" class="qty"
                                                       value="@{{ item.quantity }}">
                                                <input type="button" value="-" class="minus" ng-click="decQty(item)">

                                            </div>
                                        </div>
                                        <div class="col-6 text-center align-items-center">
                                            <h6><strong>@{{ item.quantity }} x $@{{ item.price }}</strong></h6>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-outline-danger btn-sm" ng-click="deleteItem(item)"><i
                                                    class="icon-close" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>


                            <!-- CART ITEM - POSTER -->
                            <div class="row">
                                <div class="col text-center">
                                    <p>Your prints total is: $@{{ totalPriceCountAll }}</p>
                                    <p><strong>If you order more than $200, you will get a 10% discount!</strong></p>
                                   {{-- <p>Discount @{{ discount }}</p>--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <a href="/start-journey" class="btn btn-sm btn-info"><i class="fas fa-image"></i> Add more files
                                        to your order - Upload More
                                        Photos</a>
                                </div>
                            </div>

                        </div>
                    </div>
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
                                    <form action="/carts/add_coupon" method="get">
                                        <div class="input-group add_promo float-right">
                                            <input type="text" name="coupon" class="form-control rounded-0" placeholder="Enter Promo Code"
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
                                            class="float-right">$@{{ totalPriceWithDiscount }}</span></strong>
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
                                @if(isAddress() == true)
                                    <li class="list-group-item text-center">
                                        <a class="btn btn-lg btn-success" href="/customer/bill/pay"><i
                                                class="fas fa-shopping-cart"></i> SECURE CHECKOUT</a>
                                    </li>
                                @elseif(Auth::guard('customer')->check())

                                    <li class="list-group-item text-center">
                                        <a class="btn btn-lg btn-success" href="/customer/address"><i
                                                class="fas fa-shopping-cart"></i> SECURE CHECKOUT</a>
                                    </li>
                                @else
                                    <li class="list-group-item text-center">
                                        <a class="btn btn-lg btn-success" href="/customer/login"><i
                                                class="fas fa-shopping-cart"></i> SECURE CHECKOUT</a>
                                    </li>
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
