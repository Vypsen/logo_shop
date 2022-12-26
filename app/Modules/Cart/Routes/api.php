<?php

use App\Modules\Cart\Http\Controllers\CartController;

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
Route::prefix('cart')->middleware('api_session')->group(function () {
    Route::post('set_quantity', CartController::class . '@setQuantity');
    Route::get('show', CartController::class . '@show');
});
