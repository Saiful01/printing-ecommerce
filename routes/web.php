<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WebApiController;
use Illuminate\Support\Facades\Route;

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
Route::get('/wall-art-poster', [Controller::class, 'wallArtPoster']);
Route::get('/cart', [Controller::class, 'cart']);




Route::any('/dropzone/store', [Controller::class, 'dropZoneStore']);
Route::any('/upload/crop', [Controller::class, 'uploadCropImage']);

/*Student Area Start*/
Route::group(['middleware' => 'user'], function () {

    Route::any('/profile', [Controller::class, 'profile']);
});
/*Student Area End*/


/*Admin Section start*/


Route::get('/login', [AdminController::class, 'login']);
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

//news Management
    Route::resource('/news', NewsController::class);
    Route::resource('/galleries', GalleryController::class);
    Route::resource('/events', EventController::class);

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

Route::group(['prefix' => 'web-api', 'middleware' => 'admin'], function () {

    Route::any('/states/{country_id}', [WebApiController::class, 'getStates']);
});
/*Admin Section End*/


