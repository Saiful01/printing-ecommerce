@extends("layouts.common")
@section("content")

    <div class="page-content" ng-controller="printingCartController2">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>Product Details</span></li>
                </ul>
            </div>
        </div>

        <div class="holder">
            <div class="container js-prd-gallery" id="prdGallery">
                <div class="row prd-block prd-block--prv-bottom prd-block--prv-double">
                    <div class="col-md-8 col-lg-8 aside--sticky js-sticky-collision">
                        <div class="aside-content">
                            <!-- Product Gallery -->
                            <div class="mb-2 js-prd-m-holder"></div>
                            <div class="prd-block_main-image">
                                <div class="prd-block_main-image-holder" id="prdMainImage">
                                    <div class="product-main-carousel js-product-main-carousel"
                                         data-zoom-position="inner">
                                        <div data-value="Beige"><span class="prd-img"><img
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{$poster->featured_image}}"
                                                    class="lazyload fade-up elzoom" alt=""
                                                    data-zoom-image="{{$poster->featured_image}}"/></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-lg-10 mt-1 mt-md-0">
                        <div class="prd-block_info prd-block_info--style1"
                             data-prd-handle="/products/copy-of-suede-leather-mini-skirt">
                            <div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
                                <div class="prd-block_price prd-block_price--style2">
                                    <div class="prd-block_price--actual" id="new_price{{$poster->id}}">${{$poster->price}}</div>

                                </div>
                                <div class="prd-block_viewed-wrap d-none d-md-flex">
                                    <div class="prd-block_viewed">
                                        <i class="icon-time"></i>
                                        <span>This product was viewed 13 times within last hour</span>
                                    </div>
                                </div>
                            </div>
                            <div class="prd-holder prd-block_info_item order-0 mt-15 mt-md-0">
                                <div class="prd-block_title-wrap">
                                    <h1 class="prd-block_title">{{$poster->title}}</h1>
                                </div>
                            </div>
                            <div class="prd-block_description prd-block_info_item ">
                                <h3>Short description</h3>
                                <p{{$poster->short_details}}</p>
                                <div class="mt-1">
                                    <p><b>Tag: </b> {{$poster->tag}}</p>
                                </div>
                            </div>
                            <div class="prd-progress prd-block_info_item" data-left-in-stock="">
                                <div class="prd-progress-text">
                                    Hurry Up! <span class="prd-progress-text-left js-stock-left"><i
                                            class="icon-air-freight"></i></span>
                                </div>
                                <div class="prd-progress-text-null"></div>
                                <div class="prd-progress-bar-wrap progress">
                                    <div class="prd-progress-bar progress-bar active" style="width: 53%;"></div>
                                </div>
                            </div>
                            <div class="order-0 order-md-100">
                                <div class="prd-block_options">
                                    <div class="prd-size swatches">
                                        <div class="option-label">Size:</div>
                                        <select class="form-control"  name="size" id="size"
                                                ng-model="poster_size{{$poster->id}}"
                                                ng-change="changePosterSize({{$poster->id}},poster_size{{$poster->id}}, {{$poster->price}})"
                                                required>
                                            <option value="">Select Size</option>
                                            @foreach($poster_size as $size)
                                                <option value="{{$size->title}}">"{{$size->title}}"</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="prd-block_actions prd-block_actions--wishlist">
                                    <div class="btn-wrap">
                                        <button class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart"
                                                ng-click="addToCart2({{$poster_size}},{{$poster}}, poster_size{{$poster->id}}, {{$poster->price}})">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="prd-block_info_item">
                                <img class="img-responsive lazyload d-none d-sm-block"
                                     src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="">
                                <img class="img-responsive lazyload d-sm-none"
                                     src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="holder mt-2 mt-md-5">
            <div class="container">
                <div class="panel-group panel-group--style1 prd-block_accordion" id="productAccordion">
                    <div class="panel">
                        <div class="panel-heading active">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">
                                    Description</a>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse show">
                            <div class="panel-body">
                                <p>{{$poster->details}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <script>

        let poster_array = <?php echo json_encode($poster_size) ?>;
        app.controller('printingCartController2', function ($scope, $http) {

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
                    "product_type": "",
                    "paper_type": "",
                    "frame_type": "",
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

                location.reload();
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
