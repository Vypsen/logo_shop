<?php

use App\Modules\Products\Http\Controllers\CategoriesController;
use App\Modules\Products\Http\Controllers\ProductsController;

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

Route::prefix('catalog')->group(function () {
    Route::get('product/list', ProductsController::class . '@index');
    Route::get('product/details', ProductsController::class . '@show');
});


Route::prefix('categories')->group(function () {
    Route::get('list', CategoriesController::class . '@index');
    Route::get('single', CategoriesController::class . '@show');
});
