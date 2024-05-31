<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\PesananController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
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

Route::get('/profil', function () {
    return view('fitur.profil');
});


Route::get('/PesananBaru', [PesananController::class, 'PesananBaru'])->name('PesananBaru');
Route::get('/PesananSiapDikrim', [PesananController::class, 'PesananSiapDikirim'])->name('pesanansiapdikirim');
Route::get('/PesananDikrim', [PesananController::class, 'PesananDikirim'])->name('Pesanandikirim');
Route::get('/PesananSelesai', [PesananController::class, 'PesananSelesai'])->name('Pesananselesai');

Route::get('/Laporan', [LaporanController::class, 'viewLaporan'])->name('viewlaporan');

Route::get('/product', [ListProductController::class, 'listproduct'])->name('listproduct');
// Route untuk detail produk
Route::get('/detail/{id_kategori}', [ListProductController::class, 'detail'])->name('detailProduct');

Route::get('/TambahProduk', [ProductController::class, 'addproduct'])->name('addproduct');
Route::post('/TambahProduk', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id_product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id_product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/TambahKategori', [KategoriController::class, 'addkategori'])->name('addkategori');
// Rute untuk menyimpan data kategori
Route::post('/TambahKategori', [KategoriController::class, 'store'])->name('categories.store');

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

// Route::post('/login', [UserController::class, 'login'])->name('login.post');

// Route::middleware(['auth', 'userAkses:admin'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('dashboard');
//     })->name('admin.dashboard');
// });

// Route::middleware(['auth', 'userAkses:customer'])->group(function () {
//     Route::get('/customer/dashboard', function () {
//         return view('layout.user');
//     })->name('customer.dashboard');
// });

// Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
});

Route::get('/home',function(){
    return redirect('/admin');
});

Route::middleware(['auth','userAkses:admin'])->group(function () {
    Route::get('/admin', [adminController::class, 'index']);
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('admin/dashboard', [adminController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin/profile', [UserController::class, 'profil'])->name('admin.profile');
    Route::post('/admin/profile', [UserController::class, 'update'])->name('admin.profile.update');;
});

Route::get('admin/customer', [adminController::class, 'customer'])->middleware('userAkses:customer');
