<?php

use Illuminate\Auth\Events\Login;
use App\Http\Controllers\SendEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\lupapassword;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


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

Route::get('/reset', function () {
    return view('resetpassword');
});

Route::get('/lupapassword', function () {
    return view('lupapassword');
})->middleware('guest')->name('password.request');

Route::post('/lupapassword', function () {
    
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

// Route::get('/register', function () {
//     return view('register');
// });
// Menampilkan formulir registrasi



Route::get('/login', function () {
    return view('login');
});




Route::get('/reset', function () {
    return view('resetpassword');
});

Route::post('/send-otp', [lupapassword::class, 'sendOtp'])->name('send.otp');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/send-email', [SendEmail::class, 'index']);






Route::post('send-otp', [UserController::class, 'sendOtp'])->name('send.otp');


Route::get('/PesananBaru', [PesananController::class, 'PesananBaru'])->name('PesananBaru');
Route::get('/PesananSiapDikrim', [PesananController::class, 'PesananSiapDikirim'])->name('pesanansiapdikirim');
Route::get('/PesananDikrim', [PesananController::class, 'PesananDikirim'])->name('Pesanandikirim');
Route::get('/PesananSelesai', [PesananController::class, 'PesananSelesai'])->name('Pesananselesai');
Route::get('/pesanan/{id}', [PesananController::class, 'show'])->name('pesanan.show');

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


Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPDF'])->name('laporan.exportPDF');



// Route::get('/laporan', [PenjualanController::class, 'view'])->name('laporan.view');
// Route::post('/laporan', [PenjualanController::class, 'refresh'])->name('laporan.refresh');
// Route::get('/laporan/data/{awal}/{akhir}', [PenjualanController::class, 'data'])->name('laporan.data');
// Route::get('/laporan/pdf/{awal}/{akhir}', [PenjualanController::class, 'exportPDF'])->name('laporan.export_pdf');
// Route::post('/laporan/update_periode', 'LaporanController@updatePeriode')->name('laporan.update_periode');
// Route::get('/laporan/data/{tanggalAwal}/{tanggalAkhir}', 'LaporanController@data')->name('laporan.data');



Route::get('/register', [UserController::class, 'viewregister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.post');

// Route::get('/register', [UserController::class, 'viewregister'])->name('register');

Route::get('password/reset', [UserController::class, 'showResetPasswordForm'])->name('password.request');
Route::post('password/email', [UserController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [UserController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [UserController::class, 'resetPassword'])->name('password.update');


Route::get('/home',function(){
    return redirect('/admin');
});

Route::middleware(['auth','userAkses:admin'])->group(function () {
    Route::get('/admin', [adminController::class, 'index']);

    Route::get('admin/dashboard', [adminController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin/profile', [UserController::class, 'profil'])->name('admin.profile');
    Route::post('/admin/profile', [UserController::class, 'update'])->name('admin.profile.update');;
});

Route::get('admin/customer', [adminController::class, 'customer'])->middleware('userAkses:customer');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');