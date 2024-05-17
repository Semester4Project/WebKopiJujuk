<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ListProductController extends Controller
{
    //
    public function listProduct() {
            // Mengambil semua data produk dari database
            $products = Product::all();
        
            // Mengirim data produk ke view untuk ditampilkan
            return view('product', compact('products'));
        }
}
