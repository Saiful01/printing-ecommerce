@extends("layouts.common")
@section("content")

    <div class="page-content" ng-controller="printingCartController">
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
                                    <div class="prd-block_price--actual">${{$poster->price}}</div>
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
                                        <select class="form-control" name="size" id="size" ng-model="poster_size" ng-int="InitialSize(poster_size)" required>
                                            <option value="">Select Size</option>
                                            @foreach($posterPrint as $size)
                                                <option value="{{$size->title}}">"{{$size->title}}"</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="prd-block_actions prd-block_actions--wishlist">
                                    <div class="btn-wrap">
                                        <button class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart"
                                                ng-click="addToCart({{$poster}})">
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
                                {{--<div class="row mt-3 mt-lg-5">
                                    <div class="col-md-12">
                                        <p>{{$poster->detailsSecTwo}} </p>
                                    </div>
                                    <div class="col-md-6"><img
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{$poster->featured_image}}" alt="" class="lazyload">
                                    </div>
                                </div>
                                <div class="row mt-3 mt-lg-5 align-items-center">
                                    <div class="col-md-6"><img
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="{{$poster->featured_image}}" alt="" class="lazyload">
                                    </div>
                                    <div class="col-md-12">
                                        <p>{{$poster->detailsSecThree}}</p>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
