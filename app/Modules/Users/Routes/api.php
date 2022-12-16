<?php

use App\Modules\Users\Http\Controllers\AuthController;

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

Route::prefix('auth')->middleware('api')->group(function () {
    Route::post('sendSms', AuthController::class . '@createVerifyCode');
    Route::post('checkSmsCode', AuthController::class . '@checkSmsCode');
});

Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::post('logout', AuthController::class . '@logout');
    Route::get('user', AuthController::class . '@getUser');
});
