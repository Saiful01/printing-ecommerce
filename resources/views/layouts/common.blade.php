<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Poster Print Store</title>
    <link rel="shortcut icon" type="/image/x-icon" href="/common/images/favicon.ico"/>
    <!-- Vendor CSS -->
    <link href="/common/css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="/common/css/vendor/vendor.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/common/css/style.css" rel="stylesheet">
    <!-- Custom font -->
    <link href="/common/fonts/icomoon/icons.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Dropzone CSS -->
    <link href="https://unpkg.com/dropzone/dist/dropzone.css" rel="stylesheet"/>
    <!-- Cropper CSS -->
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <script>
        var app = angular.module('myApp', []);
    </script>
    <script src="/js/cart.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

    <style>
        #result canvas {
            width: 100%;
        }
        input[type="text"] {
            border: 1px solid #cfcbcb;
            width: 100%;
            padding-right: 59px;
            height: 60px;
        }
        input[type="text"] {
            border: 1px solid #c9bebe !important;
            /* border-color: #0a0c0d !important; */
        }
    </style>

</head>
<body class="has-smround-btns has-loader-bg equal-height" ng-app="myApp" ng-controller="printingCartController" ng-init="taxCharge()">
    @include('sweetalert::alert')
<!--header-->
<header class="hdr-wrap">
    <div class="hdr-content hdr-content-sticky" >
        <div class="container">
            <div class="row">
                <div class="col-auto show-mobile">
                    <!-- Menu Toggle -->
                    <div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a>
                    </div>
                    <!-- /Menu Toggle -->
                </div>
                <div class="col-auto hdr-logo">
                    <a href="/" class="logo"><img
                            srcset="/common/images/logo/logo.png 1x, /common/images/logo/logo2x.png 2x"
                            alt="Logo"></a>
                </div>
                <!--navigation-->
                <div class="hdr-nav hide-mobile nav-holder-s">
                </div>
                <!--//navigation-->
                <div class="hdr-links-wrap col-auto ml-auto">
                    <div class="hdr-inline-link">
                        <!-- Header Account -->
                        <div class="dropdn dropdn_account dropdn_fullheight">
                            <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon"
                               data-panel="#dropdnAccount"><i class="icon-user"></i><span
                                    class="dropdn-link-txt">Account</span></a>
                        </div>
                        <!-- /Header Account -->
                        <div class="dropdn dropdn_fullheight minicart">
                            <a href="/cart" class="dropdn-link only-icon wishlist-link ">
                                <i class="icon-basket"></i><span
                                    class="dropdn-link-txt">Wishlist</span><span
                                    class="minicart-qty" >@{{ total_item }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hdr" >
        <div class="hdr-topline hdr-topline--light js-hdr-top">
            <div class="container">
                <div class="row flex-nowrap">
                    <div class="col hdr-topline-left hide-mobile">
                        <!-- Header Social -->
                        <div class="hdr-line-separate">
                            <ul class="social-list list-unstyled">
                                <li>
                                    <a href="#"><i class="icon-facebook"></i></a>
                                </li>
                                {{--<li>
                                    <a href="#"><i class="icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-google"></i></a>
                                </li>--}}
                                <li>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-vimeo"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /Header Social -->
                    </div>
                    <div class="col hdr-topline-center">
                        <div class="custom-text js-custom-text-carousel"
                             data-slick='{"speed": 1000, "autoplaySpeed": 3000}'>
                            <div class="custom-text-item"><i class="icon-fox"></i> We never use cheap economy
                                paper when
                                printing!
                            </div>
                            <div class="custom-text-item"><i class="icon-gift"></i> Your photos will be printed
                                on
                                premium grade quality photo paper
                            </div>
                        </div>
                    </div>
                    <div class="col hdr-topline-right hide-mobile">
                        <div class="hdr-inline-link">
                            <div class="hdr_container_desktop">
                                <!-- Header Account -->
                                <div class="dropdn dropdn_account dropdn_fullheight">
                                    <a href="#" class="dropdn-link js-dropdn-link"
                                       data-panel="#dropdnAccount"><i
                                            class="icon-user"></i><span
                                            class="dropdn-link-txt">Account</span></a>
                                </div>
                                <!-- /Header Account -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-content">
            <div class="container">
                <div class="row">
                    <div class="col-auto show-mobile">
                        <!-- Menu Toggle -->
                        <div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a>
                        </div>
                        <!-- /Menu Toggle -->
                    </div>
                    <div class="col-auto hdr-logo">
                        <a href="/" class="logo"><img
                                srcset="/common/images/logo/logo.png 1x, /common/images/logo/logo2x.png 2x"
                                alt="Logo"></a>
                    </div>
                    <!--navigation-->
                    <div class="hdr-nav hide-mobile nav-holder justify-content-center px-4">
                        <!--mmenu-->
                        <ul class="mmenu mmenu-js">
                            <li class="mmenu-item--simple"><a href="/" class="active">Home</a></li>
                            <li class="mmenu-item--mega"><a href="#">Custom Poster Prints</a>
                                <div class="mmenu-submenu mmenu-submenu--has-bottom">
                                    <div class="mmenu-submenu-inside">
                                        <div class="container">
                                            <div class="mmenu-right width-25">
                                                <div class="mmenu-bnr-wrap">
                                                    <a href="#" class="image-hover-scale"><img
                                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                            data-srcset="/common/images/assets/mega-munu-img.jpg"
                                                            class="lazyload fade-up" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="mmenu-cols column-4">
                                                <div class="mmenu-col">
                                                    <h3 class="submenu-title"><a href="#">Poster Prints</a></h3>
                                                    <ul class="submenu-list">
                                                        <li><a href="/customize-poster-print">Extremely affordable<span
                                                                    class="submenu-link-txt">custom size posters</span></a>
                                                        </li>
                                                        <li><a href="/start-journey">Customize
                                                                everything<span class="submenu-link-txt">from the size to the paper stock to fit your needs</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mmenu-col">
                                                    <h3 class="submenu-title"><a href="#">Foam Board Prints</a></h3>
                                                    <ul class="submenu-list">
                                                        <li><a href="/foam-board-print">Turn your into a sign,<span
                                                                    class="submenu-link-txt">display or presentation board for exhibitions</span></a>
                                                        </li>
                                                        <li><a href="/mounted-foam-board-print">Mounted print on
                                                                foam<span
                                                                    class="submenu-link-txt">Core board for easy hanging, framing or display</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mmenu-col">
                                                    <h3 class="submenu-title"><a href="#">Aluminum Prints</a></h3>
                                                    <ul class="submenu-list">
                                                        <li><a href="/aluminum-print">Infuse your artwork onto<span
                                                                    class="submenu-link-txt">aluminum for a compelling and impactful show</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="mmenu-bottom justify-content-center">
                                                    <a href="#"><i class="icon-shield icon--lg"></i><b>Poster Print
                                                            Store</b></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="/poster-print">Banner</a>
                            <li><a href="/wall-art-poster">Wall Arts & Posters</a>
                            </li>
                            <li><a href="/pricing">Pricing</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                        <!--/mmenu-->
                    </div>
                    <!--//navigation-->
                    <div class="hdr-links-wrap col-auto ml-auto">
                        <div class="hdr-inline-link">
                            <!-- Header Wishlist -->
                            <div class="dropdn dropdn_wishlist">
                                <a href="/cart" class="dropdn-link only-icon wishlist-link ">
                                    <i class="icon-basket"></i><span
                                        class="dropdn-link-txt">Wishlist</span><span
                                        class="minicart-qty" ng-bind="total_item">@{{ total_item }}</span>
                                </a>

                            </div>
                            <!-- /Header Wishlist -->
                            <div class="hdr_container_mobile show-mobile">
                                <!-- Header Account -->
                                <div class="dropdn dropdn_account dropdn_fullheight">
                                    <a href="#" class="dropdn-link js-dropdn-link"
                                       data-panel="#dropdnAccount"><i
                                            class="icon-user"></i><span
                                            class="dropdn-link-txt">Account</span></a>
                                </div>
                                <!-- /Header Account -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-side-panel">
    <!-- Mobile Menu -->
    <div class="mobilemenu js-push-mbmenu">
        <div class="mobilemenu-content">
            <div class="mobilemenu-close mobilemenu-toggle">Close</div>
            <div class="mobilemenu-scroll">
                <div class="nav-wrapper show-menu">
                    <ul class="nav nav-level-1">
                        <li><a href="/">Home</a></li>
                        <li><a href="/poster-print">Banner</a></li>
                        <li><a href="/wall-art-poster">Wall Arts & Posters</a></li>
                        <li><a href="/foam-board-print">Foam Board Prints</a></li>
                        <li><a href="/aluminum-print">Aluminum Prints</a></li>
                        <li><a href="/pricing">Pricing</a></li>
                        <li><a href="/faql">FAQ</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Mobile Menu -->
    <div class="dropdn-content account-drop" id="dropdnAccount">
        <div class="dropdn-content-block">
            <div class="dropdn-close"><span class="js-dropdn-close">Close</span></div>
            @if (!Auth::guard('customer')->check())

                <ul>
                    <li><a href="/customer/register"><span>Register</span><i class="icon-user2"></i></a></li>
                </ul>
                <div class="dropdn-form-wrapper">
                    <h5>Quick Login</h5>
                    <form action="/customer/login-check" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control--sm is-invalid"
                                   placeholder="Enter your e-mail" name="email" required>
                            <div class="invalid-feedback">Can't be blank</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control--sm"
                                   placeholder="Enter your password" name="password" required>
                        </div>
                        <button type="submit" class="btn">Login</button>
                    </form>
                </div>
            @else
                <ul>
                    <li>
                        <a href="/customer/profile"><span>{{Auth::guard('customer')->user()->firstName}} {{Auth::guard('customer')->user()->lastName}}</span><i
                                class="icon-user2"></i></a></li>
                </ul>
                <ul>
                    <li><a href="/customer/logout"><span>Logout</span><i class="icon-locker"></i></a></li>
                </ul>
            @endif

        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>

</div>
<!--//header-->

@yield("content")

<footer class="page-footer footer-style-6 ">
    <div class="holder ">
        <div class="footer-shop-info">
            <div class="container">
                <div class="text-icn-blocks-bg-row">
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-trolley"></i>
                        </div>
                        <div class="text">
                            <h4>Extra fast delivery</h4>
                            <p>Your order will be delivered 3-5 business days after all of your items are
                                available</p>
                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-currency"></i>
                        </div>
                        <div class="text">
                            <h4>Best price</h4>
                            <p>We'll match the product prices of key online and local competitors for
                                immediately</p>
                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-diplom"></i>
                        </div>
                        <div class="text">
                            <h4>Guarantee</h4>
                            <p>If the item you want is available, we can process a return and place a new
                                order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="row mt-0">
                <div class="col-lg col-xl last-mobile">
                    <div class="footer-block">
                        <div class="footer-logo">
                            <a href="/"><img class="lazyload fade-up"
                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                             data-srcset="/common/images/logo-footer.png 1x, /common/images/logo-footer2x.png 2x"
                                             alt="Logo"></a>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li>E-mail: <a href="mailto:posterprintstore@gmail.com">posterprintstore@gmail.com</a>
                                </li>
                                <li>Hours: 10:00 - 18:00, Mon - Fri</li>
                            </ul>
                        </div>
                        <ul class="social-list">
                            <li>
                                <a href="#" class="icon icon-facebook"></a>
                            </li>
                            {{--<li>
                                <a href="#" class="icon icon-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-google"></a>
                            </li>--}}
                            <li>
                                <a href="#" class="icon icon-vimeo"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-youtube"></a>
                            </li>
                            <li>
                                <a href="#" class="icon icon-pinterest"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg col-xl">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Quick Links</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li><a href="/poster-print">Banner</a></li>
                                <li><a href="/wall-art-poster">Wall Arts & Posters</a></li>
                                <li><a href="/foam-board-print">Foam Board Prints</a></li>
                                <li><a href="/aluminum-print">Aluminum Prints</a></li>
                                <li><a href="/pricing">Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-xl">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Legal Informations</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li><a href="/terms-and-conditions">Terms & Conditions</a></li>
                                <li><a href="/faq">FAQ</a></li>
                                <li><a href="/return-policy">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-xl">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Safe payments</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul class="payment-link">
                                <li><i class="icon-stripe-logo"></i></li>
                                <li><i class="icon-visa-pay-logo"></i></li>
                                <li><i class="icon-master-card-logo"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom footer-bottom--bg">
        <div class="container">
            <div class="footer-copyright text-center">
                <a href="#">Poster Print Store</a> ©2022
            </div>
        </div>
    </div>
</footer>
<script src="/common/js/vendor-special/lazysizes.min.js"></script>
<script src="/common/js/vendor-special/ls.bgset.min.js"></script>
<script src="/common/js/vendor-special/ls.aspectratio.min.js"></script>
<script src="/common/js/vendor-special/jquery.min.js"></script>
<script src="/common/js/vendor-special/jquery.ez-plus.js"></script>
<script src="/common/js/vendor-special/instafeed.min.js"></script>
<script src="/common/js/vendor/vendor.min.js"></script>
<script src="/common/js/app-html.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@stack('footer-scripts')

</body>
</html>

