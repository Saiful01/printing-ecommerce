@extends("layouts.common")
@section("content")

    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>Wall Arts Poster</span></li>
                </ul>
            </div>
        </div>
        <div class="holder holder-mt-medium" ng-controller="printingCartController">
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
                        <div class="items-count">35 item(s)</div>
                        <div class="select-wrap d-none d-md-flex">
                            <div class="select-label">SORT:</div>
                            <div class="select-wrapper select-wrapper-xxs">
                                <select class="form-control input-sm">
                                    <option value="featured">Featured</option>
                                    <option value="rating">Rating</option>
                                    <option value="price">Price</option>
                                </select>
                            </div>
                        </div>
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
                        <div class="viewmode-wrap">
                            <div class="view-mode">
                                <span class="js-horview d-none d-lg-inline-flex"><i class="icon-grid"></i></span>
                                <span class="js-gridview"><i class="icon-grid"></i></span>
                                <span class="js-listview"><i class="icon-list"></i></span>
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

                                @foreach($products as $product)
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-lg">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="/product-details/{{$product->id}}"
                                                   class="prd-img image-hover-scale image-container">
                                                    <img src="{{$product->featured_image}}"
                                                         alt="Exclusive Wall Poster"
                                                         class="js-prd-img fade-up lazyloaded">
                                                </a>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <h2 class="prd-title"><a
                                                            href="/product-details/{{$product->id}}">{{$product->title}}</a>
                                                    </h2>
                                                    <div class="prd-description">
                                                        >{{$product->details}}
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-price">

                                                        <div class="price-new">$ {{$product->price}}</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">

                                                            <button class="btn js-prd-addtocart"
                                                                    ng-click="addToCart({{$product}})">Add To Cart
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


@endsection
