<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\productController;

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Web\CategoriesController;
use App\Http\Controllers\Web\ProductController as WebProductController;
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


//register new user
Route::post('register', [AuthenticationController::class, 'register']);
//login user
Route::post('signin', [AuthenticationController::class, 'signin']);
//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', [AuthenticationController::class, 'profile']);
    Route::post('logout', [AuthenticationController::class, 'logout']);
    Route::apiResource('orders', OrderController::class);
});

Route::prefix('dashboard')->middleware(['auth:sanctum', 'isAdmin'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::apiResource('products', productController::class);
    Route::apiResource('users', UserController::class);
    Route::patch('product/activation/{product}', [productController::class, 'activation']);
    Route::apiResource('orders', OrderController::class);
});

Route::apiResource('categories', CategoriesController::class)->only(['index', 'show', 'test']);
Route::apiResource('products', WebProductController::class);