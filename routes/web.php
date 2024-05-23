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


Route::get('/PesananBaru', [PesananController::class, 'PesananBaru'])->name('PesananBaru');
Route::get('/PesananSiapDikrim', [PesananController::class, 'PesananSiapDikirim'])->name('pesanansiapdikirim');
Route::get('/PesananDikrim', [PesananController::class, 'PesananDikirim'])->name('Pesanandikirim');
Route::get('/PesananSelesai', [PesananController::class, 'PesananSelesai'])->name('Pesananselesai');

Route::get('/Laporan', [LaporanController::class, 'viewLaporan'])->name('viewlaporan');

Route::get('/product', [ListProductController::class, 'listproduct'])->name('listproduct');
// Route untuk detail produk
Route::get('/products/{id}', [ListProductController::class, 'detail'])->name('detailProduct');

Route::get('/TambahProduk', [ProductController::class, 'addproduct'])->name('addproduct');
Route::post('/TambahProduk', [ProductController::class, 'store'])->name('products.store');

Route::get('/TambahKategori', [KategoriController::class, 'addkategori'])->name('addkategori');
// Rute untuk menyimpan data kategori
Route::post('/TambahKategori', [KategoriController::class, 'store'])->name('categories.store');

// Route::middleware(['guest'])->group(function (){
//     // Route::get('/login', [UserController::class, 'index']); // Hapus middleware guest di sini
//     Route::get('/login', function () {
//         return view('login');
//     });
//     Route::post('/login', [UserController::class, 'login'])->name('login');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//     Route::middleware(['userAkses:admin'])->group(function () {
//         Route::get('/home', function () {
//             return redirect()->route('index'); // Mengarahkan kembali ke rute admin.index
//         })->name('layout.home'); // Mengatur nama untuk rute home admin
//         Route::get('/admin', [AdminController::class, 'index'])->name('index');
//         Route::get('/customer', [AdminController::class, 'customer'])->name('customer');
//     });

//     Route::middleware(['userAkses:customer'])->group(function () {
//         Route::get('/home', function () {
//             return redirect()->route('customer'); // Mengarahkan kembali ke rute customer
//         })->name('layout.customer'); // Mengatur nama untuk rute home customer
//         Route::get('/customer', [AdminController::class, 'customer'])->name('customer');
//     });
// });

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login.post');

Route::middleware(['auth', 'userAkses:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'userAkses:customer'])->group(function () {
    Route::get('/customer/dashboard', function () {
        return view('layout.user');
    })->name('customer.dashboard');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');