<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware(['guest'])->group(function (){
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/home', function () {
        return redirect('/admin');
    });
    Route::get('/admin/penjual', [AdminController::class, 'penjual'])->middleware('userAkses:admin');
    Route::get('/admin/customer', [AdminController::class, 'customer'])->middleware('userAkses:customer');
    Route::get('/logout', [UserController::class, 'logout']);
});

// // Route Api Login
// Route::post('/masuk', [AuthenticationController::class, 'login']);

// // Rout Api Logout
// Route::get('/keluar', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);

// Route::group(['middleware'])