<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AluminiumPrintController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomPrintController;
use App\Http\Controllers\FoamCoreBoardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PosterPrintController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\WebApiController;
use App\Models\Product;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Public Section start*/

Route::get('/', [Controller::class, 'home']);
Route::get('/start-journey', [Controller::class, 'startJourney']);
Route::get('/create-poster', [Controller::class, 'createPoster']);
Route::get('/poster-print', [Controller::class, 'showBanner']);
Route::get('/wall-art-poster', [Controller::class, 'wallArtPoster']);
Route::get('/poster-details/{id}', [Controller::class, 'wallArtPosterDetails']);
Route::get('/foam-board-print', [Controller::class, 'foamBoard']);
Route::get('/mounted-foam-board-print', [Controller::class, 'mountedFoamBoard']);
Route::get('/customize-poster-print', [Controller::class, 'customizePosterPrint']);
Route::get('/aluminum-print', [Controller::class, 'aluminiumPrint']);
Route::get('/paper-types', [Controller::class, 'paperTypes']);
Route::get('/pricing', [Controller::class, 'showPricing']);
Route::get('/terms-and-conditions', [Controller::class, 'showTermsAndConditions']);
Route::get('/faq', [Controller::class, 'showFAQ']);
Route::get('/return-policy', [Controller::class, 'showReturnPolicy']);
Route::get('/contact', [Controller::class, 'showContactUs']);
Route::get('/cart', [Controller::class, 'cart']);
Route::get('/orders/new', [Controller::class, 'orderNew']);


Route::any('/dropzone/store', [Controller::class, 'dropZoneStore']);
Route::any('/upload/crop', [Controller::class, 'uploadCropImage']);

/*Customer Area Start*/
Route::any('/customer/login', [CustomerController::class, 'login']);
Route::any('/customer/register', [CustomerController::class, 'register']);
Route::any('/customer/register/store', [CustomerController::class, 'registerSave']);
Route::any('/customer/login-check', [CustomerController::class, 'loginCheck']);

Route::group(['prefix' => 'customer', 'middleware' => 'customer'], function () {
    Route::any('/profile', [CustomerController::class, 'customerProfile']);
    Route::any('/order/history', [CustomerController::class, 'customerOrderHistory']);
    Route::any('/orders-detail/{id}', [CustomerController::class, 'customerOrderDetails']);
    Route::any('/address', [CustomerController::class, 'customerAddress']);
    Route::any('/address/store', [CustomerController::class, 'customerAddressStore']);
    Route::any('/address/show', [CustomerController::class, 'customerAddressShow']);
    Route::any('/address/edit/{id}', [CustomerController::class, 'customerAddressEdit']);
    Route::any('/address/update', [CustomerController::class, 'customerAddressUpdate']);
    Route::any('/bill/pay', [CustomerController::class, 'customerBillPay']);
    Route::post('/bill/payment', [StripeController::class, 'payStripe']);
    /*Route::any('/checkout', [CheckoutController::class, 'checkout']);
    Route::any('/checkout', [CheckoutController::class, 'afterPayment'])->name('checkout.credit-card');*/
    Route::any('/logout', [CustomerController::class, 'logout']);
});
/*Customer Area End*/

Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('payment', [StripeController::class, 'payStripe']);
Route::get('checkout', [CheckoutController::class, 'checkout']);
Route::post('checkout', [CheckoutController::class, 'afterPayment'])->name('checkout.credit-card');
/*Admin Section start*/


Route::get('/login', [AdminController::class, 'login']);
Route::get('/admin', [AdminController::class, 'login']);
Route::get('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/forgot-password', [AdminController::class, 'forgotPassword']);
Route::post('/admin/login-check', [AdminController::class, 'loginCheck']);
Route::post('/admin/password-change', [AdminController::class, 'passwordChange']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/profile', [AdminController::class, 'profile']);
    Route::post('/profile-update', [AdminController::class, 'profileUpdate']);
    Route::post('/password-update', [AdminController::class, 'passwordUpdate']);
    Route::get('/logout', [AdminController::class, 'logout']);

});

Route::group(['middleware' => 'admin'], function () {

    //Poster Print
    Route::get('/admin/poster/price', [PosterPrintController::class, 'index']);
    Route::post('/admin/poster/price/store', [PosterPrintController::class, 'store']);
    Route::get('/admin/poster/price/show', [PosterPrintController::class, 'show']);
    Route::get('/admin/poster/price/edit/{id}', [PosterPrintController::class, 'edit']);
    Route::post('/admin/poster/price/update', [PosterPrintController::class, 'update']);
    Route::get('/admin/poster/price/delete/{id}', [PosterPrintController::class, 'destroy']);

    //Foam Board Print
    Route::get('/admin/foam-board/price', [FoamCoreBoardController::class, 'index']);
    Route::post('/admin/foam-board/price/store', [FoamCoreBoardController::class, 'store']);
    Route::get('/admin/foam-board/price/show', [FoamCoreBoardController::class, 'show']);
    Route::get('/admin/foam-board/price/edit/{id}', [FoamCoreBoardController::class, 'edit']);
    Route::post('/admin/foam-board/price/update', [FoamCoreBoardController::class, 'update']);
    Route::get('/admin/foam-board/price/delete/{id}', [FoamCoreBoardController::class, 'destroy']);

    //Aluminum Print
    Route::get('/admin/aluminum/price', [AluminiumPrintController::class, 'index']);
    Route::post('/admin/aluminum/price/store', [AluminiumPrintController::class, 'store']);
    Route::get('/admin/aluminum/price/show', [AluminiumPrintController::class, 'show']);
    Route::get('/admin/aluminum/price/edit/{id}', [AluminiumPrintController::class, 'edit']);
    Route::post('/admin/aluminum/price/update', [AluminiumPrintController::class, 'update']);
    Route::get('/admin/aluminum/price/delete/{id}', [AluminiumPrintController::class, 'destroy']);

    //Custom Print
    Route::get('/admin/custom/price', [CustomPrintController::class, 'index']);
    Route::post('/admin/custom/price/store', [CustomPrintController::class, 'store']);
    Route::get('/admin/custom/price/show', [CustomPrintController::class, 'show']);
    Route::get('/admin/custom/price/edit/{id}', [CustomPrintController::class, 'edit']);
    Route::post('/admin/custom/price/update', [CustomPrintController::class, 'update']);
    Route::get('/admin/custom/price/delete/{id}', [CustomPrintController::class, 'destroy']);

    //Wall Art & Poster Print
    Route::get('/admin/wall-art-poster/add', [ProductController::class, 'index']);
    Route::post('/admin/wall-art-poster/store', [ProductController::class, 'store']);
    Route::get('/admin/wall-art-poster/show', [ProductController::class, 'show']);
    Route::get('/admin/wall-art-poster/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/admin/wall-art-poster/update', [ProductController::class, 'update']);
    Route::get('/admin/wall-art-poster/delete/{id}', [ProductController::class, 'destroy']);

    //Coupon Section
    Route::get('/admin/coupon/add', [CouponController::class, 'index']);
    Route::post('/admin/coupon/store', [CouponController::class, 'store']);
    Route::get('/admin/coupon/show', [CouponController::class, 'show']);
    Route::get('/admin/coupon/edit/{id}', [CouponController::class, 'edit']);
    Route::post('/admin/coupon/update', [CouponController::class, 'update']);
    Route::get('/admin/coupon/delete/{id}', [CouponController::class, 'destroy']);

    //Shipping Section
    Route::get('/admin/shipping/add', [ShippingController::class, 'index']);
    Route::post('/admin/shipping/store', [ShippingController::class, 'store']);
    Route::get('/admin/shipping/show', [ShippingController::class, 'show']);
    Route::get('/admin/shipping/edit/{id}', [ShippingController::class, 'edit']);
    Route::post('/admin/shipping/update', [ShippingController::class, 'update']);
    Route::get('/admin/shipping/delete/{id}', [ShippingController::class, 'destroy']);

    //Tax Section
    /*Route::get('/admin/tax/add', [TaxController::class, 'index']);
    Route::post('/admin/tax/store', [TaxController::class, 'store']);
    Route::get('/admin/tax/show', [TaxController::class, 'show']);*/
    Route::get('/admin/tax/edit', [TaxController::class, 'edit']);
    Route::post('/admin/tax/update', [TaxController::class, 'update']);
    /*Route::get('/admin/tax/delete/{id}', [TaxController::class, 'destroy']);*/

    //Customers Section
    Route::any('/admin/customers/show', [AdminController::class, 'customersList']);

    //Manage Order
    Route::any('/admin/order/show', [OrderController::class, 'show']);
    Route::get('/admin/order/details/{id}', [OrderController::class, 'orderDetails']);
    Route::get('/admin/order-status-update/{id}/{status}', [OrderController::class, 'orderStatusUpdate']);
    Route::get('/admin/order-invoice/print/{invoice}', [OrderController::class, 'invoicePrint']);
    Route::get('/admin/order-status/history/{id}', [OrderController::class, 'orderDeliveryStatus']);
    Route::post('/admin/order/store', [OrderController::class, 'store']);
    Route::get('/admin/order/edit/{id}', [OrderController::class, 'edit']);
    Route::post('/admin/order/update', [OrderController::class, 'update']);

    Route::get('/admin/admins', [AdminRoleController::class, 'show']);
    Route::get('/admin/edit/{id}', [AdminRoleController::class, 'edit']);
    Route::post('/admin/update', [AdminRoleController::class, 'update']);
    Route::get('/admin/create', [AdminRoleController::class, 'create']);
    Route::post('/admin/store', [AdminRoleController::class, 'store']);
    Route::get('/admin/delete/{id}', [AdminRoleController::class, 'destroy']);


});


///map

Route::group(['prefix' => 'operator', 'middleware' => 'operator'], function () {

});

Route::group(['prefix' => 'web-api'], function () {

    Route::any('/states/{country_id}', [WebApiController::class, 'getStates']);
    Route::any('/tax-charge', [WebApiController::class, 'getTaxFee']);
    Route::any('/coupon-save', [WebApiController::class, 'couponSave']);





    Route::any('/custom-poster-price', [WebApiController::class, 'customPosterPrice']);
});
/*Admin Section End*/


Route::get('/migrate', function () {

    //return "Not allowed!";
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    Artisan::call('config:clear');

    return "Migrate!";

});
Route::post('/contact/send', function (\Illuminate\Http\Request $request) {
    //return $request->all();
    $name = $request['name'];
    $lastname = $request['lastName'];
    $phone = $request['Phone'];
    $email = $request['email'];
    $message = $request['message'];


    $msg = "Name : $name,\n Last name: $lastname ,\n Phone: $phone ,\n Email : $email ,\n Message : $message";


    try {
        mail("customerservice@posterprintstore.com", "Poster print store", $msg);
        Alert::success('Congrats', 'Your Message Successfully Send');
    }catch (\Exception $exception){
        return $exception->getMessage();
    }


});

Route::get('/test', function () {

    return view("cropper2");



    $array = [
        'title' => "dddddd",
        'price' => "50",
        'featured_image' => "ffff",
        'size' => "12X511",
        'short_details' => "Saved from custom",
        'details' => "Saved from custom",
        'tag' => "Saved from custom",
    ];
    try {
        $get_id = Product::insertGetId($array);
        return $get_id;
    } catch (\Exception $exception) {
        return $exception->getMessage();
    }

    return "Migrate!";

});
