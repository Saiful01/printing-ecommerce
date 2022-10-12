<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1', ], function () {
    /*Route::post('/user/save-inout-data', [ApiController::class, 'saveInOutData']);*/
    Route::post('/login-using-id', [ApiController::class, 'loginUsingId']);

    Route::post('/login', [ApiController::class, 'login']);
    Route::post('/save-inout-data', [ApiController::class, 'saveInOutData']);
    Route::post('/get-inout-data', [ApiController::class, 'getInOutData']);

    Route::post('/save-outside-visit-data', [ApiController::class, 'saveOutSideData']);
    Route::post('/get-outside-visit-data', [ApiController::class, 'getOutSideData']);

    Route::post('/save-leave-data', [ApiController::class, 'saveLeavedata']);
    Route::post('/get-leave-data', [ApiController::class, 'getLeavedata']);
    Route::post('/update-profile', [ApiController::class, 'updateProfile']);

    Route::post('/get-messages', [ApiController::class, 'message']);

    Route::any('/upload-document', [ApiController::class, 'saveDocument']);
});

