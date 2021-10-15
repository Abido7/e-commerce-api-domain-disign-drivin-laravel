<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

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

Route::get('categories', [CategoriesController::class, 'index']);
Route::get('test/{product}', [CategoriesController::class, 'test']);
Route::get('categories/{category}', [CategoriesController::class, 'show']);
Route::apiResource('products', ProductController::class);
Route::get('attributes', [AttributeController::class, 'index']);