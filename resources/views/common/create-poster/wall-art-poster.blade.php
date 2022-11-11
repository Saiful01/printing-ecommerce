@extends("layouts.common")
@section("content")
    <style>
        .prd-size select {
            width: 150px;

        }
    </style>

    <div class="page-content" ng-controller="printingCartController">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>Wall Arts Poster</span></li>
                </ul>
            </div>
        </div>
        <div class="holder holder-mt-medium" >
            <div class="container">
                <!-- Two columns -->
                <!-- Page Title -->
                <div class="page-title text-center">
                    <h1>Wall Arts &amp; Poster</h1>
                </div>
                <!-- /Page Title -->
                <!-- Filter Row -->
                <div class="filter-row">
                    <div class="row">
                        <div class="select-wrap d-none d-md-flex">
                            <div class="select-label">VIEW:</div>
                            <div class="select-wrapper select-wrapper-xxs">
                                <select class="form-control input-sm">
                                    <option value="featured">12</option>
                                    <option value="rating">36</option>
                                    <option value="price">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Filter Row -->
                <div class="row">
                    <!-- Center column -->
                    <div class="col-lg aside">
                        <div class="prd-grid-wrap">
                            <!-- Products Grid -->
                            <div
                                class="prd-grid product-listing data-to-show-4 data-to-show-md-3 data-to-show-sm-2 js-category-grid"
                                data-grid-tab-content="">

                                @foreach($posters as $poster)

                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-lg">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="/poster-details/{{$poster->id}}"
                                                   class="prd-img image-hover-scale image-container">
                                                    <img src="{{$poster->featured_image}}"
                                                         alt="Exclusive Wall Poster"
                                                         class="js-prd-img fade-up lazyloaded">
                                                </a>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">

                                                    {{--<p id="new_price{{$poster->id}}">$ {{$poster->price}}</p>--}}

                                                    <h2 class="prd-title"><a
                                                            href="/poster-details/{{$poster->id}}">{{$poster->title}}</a>
                                                    </h2>

                                                    <b><p style="margin-left: 110px;" id="new_price{{$poster->id}}">$ {{$poster->price}}</p></b>
                                                    <div class="prd-size swatches">

                                                        <center>
                                                            <select class="form-control" name="size" id="size"
                                                                    ng-model="poster_size{{$poster->id}}"
                                                                    ng-change="changePosterSize({{$poster->id}},poster_size{{$poster->id}}, {{$poster->price}})"
                                                                    required>
                                                                <option value="">Select Size</option>
                                                                @foreach($poster_size as $size)
                                                                    <option value="{{$size->title}}">"{{$size->title}}
                                                                        "
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </center>

                                                    </div>

                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-price">

                                                        {{--<div class="price-new"><p id="new_price{{$poster->id}}">$ {{$poster->price}}</p></div>--}}
                                                    </div>

                                                    <div class="prd-action">

                                                        <div class="prd-action-left">

                                                            <button class="btn js-prd-addtocart"
                                                                    ng-click="addToCart2({{$poster_size}},{{$poster}}, poster_size{{$poster->id}}, {{$poster->price}})">
                                                                Add To Cart
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- /Center column -->
                </div>
                <!-- /Two columns -->
            </div>
        </div>
    </div>


    <script>

        let poster_array = <?php echo json_encode($poster_size) ?>;
        app.controller('printingCartController', function ($scope, $http) {

            $scope.product_type = "1";
            $scope.poster_size = "1";
            $scope.paper_type = "1";
            $scope.changePosterSize = function (id, size, price) {
                let data = poster_array.find((poster) => poster.title == size,);
                document.getElementById("new_price" + id).innerHTML = price + data['photo_premium_glossy'];

            }

            $scope.addToCart2 = function (poster_size, item, size, old_price) {

                let poster_array2 = <?php echo json_encode($poster_size) ?>;
                let data = poster_array2.find((mposter) => mposter.title == size);
                let new_price = old_price + data['photo_premium_glossy'];

                let tempProduct = {
                    "id": item.id,
                    "title": item.title,
                    "price": new_price,
                    "featured_image": item.featured_image,
                    "quantity": 1,
                    "size": size,
                };

                if ($scope.size == "") {
                    return messageError("Please select poster size");
                }
                let flag = false;

                let cartProductList = localStorage.getItem('cart_product');
                if (cartProductList !== null && cartProductList !== undefined) {
                    cartProductList = JSON.parse(cartProductList);

                    if (cartProductList.length <= 0) {
                        //Nothing
                    } else {
                        for (var cartProduct of cartProductList) {
                            if (cartProduct.id === item.id) {
                                cartProduct.quantity += 1;
                                flag = true;
                                break;
                            }
                        }
                    }
                } else {
                    cartProductList = [];
                }

                if (!flag) {
                    cartProductList.push(tempProduct);
                    messageSuccess("Product added to cart")
                } else {
                    messageSuccess("Product added to cart")
                }
                localStorage.setItem('cart_product', JSON.stringify(cartProductList));
               // $scope.getTotalPrice();
                //$scope.getList();

            }

            function messageError(message) {
                toastr.warning(message, 'Failed')
            }

            function messageSuccess(message) {
                toastr.success(message, 'Success')
            }


        });

    </script>
@endsection
