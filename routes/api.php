<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/auth/register', [UserController::class, 'createUser']);
// Route::post('/auth/login', [UserController::class, 'loginUser']);
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/auth/logout', [UserController::class, 'logoutUser']);
// });

Route::post('/auth/register', [UserController::class, 'createUser']);
Route::post('/auth/login', [UserController::class, 'loginUser']);
Route::post('/auth/logout', [UserController::class, 'logoutUser']);

Route::get('/products', [ProductApi::class, 'listProduct']);
Route::get('/products/{id}', [ProductApi::class, 'detail']);
Route::get('/categories', [ProductApi::class, 'listCategories']);
Route::get('/products-and-categories', [ProductApi::class, 'listProductsAndCategories']);