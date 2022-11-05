@extends("layouts.common")
@section("content")

    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
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
                                    <div class="prd-block_price--actual">$180.00</div>
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
                                    <h1 class="prd-block_title">Exclusive Wall Poster</h1>
                                </div>
                            </div>
                            <div class="prd-block_description prd-block_info_item ">
                                <h3>Short description</h3>
                                <p>Model is 5'9" wearing Size XS TallAnd without further ado, we give you our finest
                                    Shopify Theme FOXic! It is a subtle, complex and yet an extremely easy to use
                                    template for anyone, who wants to create own website in ANY area of
                                    expertise.</p>
                                <div class="mt-1">
                                    <p><b>Tag: </b> Poster, design, poster print</p>
                                </div>
                            </div>
                            <div class="prd-progress prd-block_info_item" data-left-in-stock="">
                                <div class="prd-progress-text">
                                    Hurry Up! <span class="prd-progress-text-left js-stock-left"><i class="icon-air-freight"></i></span>
                                </div>
                                <div class="prd-progress-text-null"></div>
                                <div class="prd-progress-bar-wrap progress">
                                    <div class="prd-progress-bar progress-bar active"
                                         data-stock="50, 10, 30, 25, 1000, 15000" style="width: 53%;"></div>
                                </div>
                            </div>
                            <div class="order-0 order-md-100">
                                <form method="post" action="#">
                                    <div class="prd-block_options">
                                        <div class="prd-size swatches">
                                            <div class="option-label">Size:</div>
                                            <select class="form-control" name="qq_framing" id="qq_framing"
                                                    onchange="quickquote();">
                                                <option value="16x20">16" x 20"</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="prd-block_actions prd-block_actions--wishlist">
                                        <div class="prd-block_qty">
                                            <div class="qty qty-changer">
                                                <button class="decrease js-qty-button"></button>
                                                <input type="number" class="qty-input" name="quantity" value="1"
                                                       data-min="1" data-max="1000">
                                                <button class="increase js-qty-button"></button>
                                            </div>
                                        </div>
                                        <div class="btn-wrap">
                                            <button class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart"
                                                    data-product='{"name":  "Leather Pegged Pants ",  "url ": "product.html",  "path ": "images/skins/fashion/product-page/product-01.jpg",  "aspect_ratio ": "0.78"}'>
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="prd-block_info_item">
                                <img class="img-responsive lazyload d-none d-sm-block"
                                     src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                     data-src="images/payment/safecheckout.png" alt="">
                                <img class="img-responsive lazyload d-sm-none"
                                     src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                     data-src="images/payment/safecheckout-m.png" alt="">
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
                                <h4>Give you a complete account of the system</h4>
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and
                                    praising pain was born and I will give you a complete account of the system, and
                                    expound the actual teachings of the great explorer of the truth, the
                                    master-builder of human happiness. </p>
                                <div class="row mt-3 mt-lg-5">
                                    <div class="col-md-12">
                                        <p>But I must explain to you how all this mistaken idea of denouncing
                                            pleasure and praising pain was born and I will give you a complete
                                            account of the system, and expound the actual teachings of the great
                                            explorer of the truth, the master-builder of human happiness. </p>
                                        <div class="mt-3"></div>
                                        <h4>List heading</h4>
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <ul class="list-unstyled list-smaller">
                                                    <li>1. All this mistaken idea of denouncing pleasure</li>
                                                    <li>2. Raising pain was born and I will give you</li>
                                                    <li>3. Complete account of the system</li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-9 mt-15 mt-sm-0">
                                                <ul class="list-unstyled list-smaller">
                                                    <li>4. All this mistaken idea of denouncing pleasure</li>
                                                    <li>5. Raising pain was born and I will give you</li>
                                                    <li>6. Complete account of the system</li>
                                                </ul>
                                            </div>
                                        </div>
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
                                        <p>But I must explain to you how all this mistaken idea of denouncing
                                            pleasure and praising pain was born and I will give you a complete
                                            account of the system, and expound the actual teachings of the great
                                            explorer of the truth, the master-builder of human happiness. </p>
                                        <p>Nor again is there anyone who loves or pursues or desires to obtain pain
                                            of itself, because it is pain, but because occasionally circumstances
                                            occur in which toil and pain can procure him some great pleasure. To
                                            take a trivial example, which of us ever undertakes laborious physical
                                            exercise, except to obtain some advantage from it? But who has any right
                                            to find fault with a man who chooses to enjoy a pleasure that has no
                                            annoying consequences, or one who avoids a pain that produces no
                                            resultant pleasure</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
    </div>
@endsection
