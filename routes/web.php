<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
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

// Route::get('/product', function () {
//     return view('product');
// });

Route::get('/kategori', function () {
    return view('fitur.kategori');
});

Route::get('/TambahProduk', function () {
    return view('fitur.tambahproduk');
});

Route::get('/rumah', function () {
    return view('rumah');
});

Route::get('/product', [ProductController::class, 'listproduct'])->name('listproduct');
Route::get('/TambahProduk', [ProductController::class, 'addproduct'])->name('addproduct');
Route::get('/TambahKategori', [KategoriController::class, 'addkategori'])->name('addkategori');

Route::middleware(['guest'])->group(function (){
    // Route::get('/login', [UserController::class, 'index']); // Hapus middleware guest di sini
    Route::get('/login', function () {
        return view('login');
    });
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware(['userAkses:admin'])->group(function () {
        Route::get('/home', function () {
            return redirect()->route('customer'); // Mengarahkan admin ke halaman customer
        })->name('layout.home'); // Mengatur nama untuk rute home admin
        Route::get('/admin', [AdminController::class, 'index'])->name('admin'); // Mengatur nama rute admin
        Route::get('/customer', [AdminController::class, 'customer'])->name('customer');
    });

    Route::middleware(['userAkses:customer'])->group(function () {
        Route::get('/home', function () {
            return redirect()->route('customer'); // Mengarahkan kembali ke halaman customer
        })->name('layout.customer'); // Mengatur nama untuk rute home customer
        Route::get('/customer', [AdminController::class, 'customer'])->name('customer');
    });
});