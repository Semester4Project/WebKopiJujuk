<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ListProductController extends Controller
{
    // Method untuk menampilkan daftar produk
    public function listProduct() {
        // Mengambil semua data produk dari database
        $products = Product::all();
    
        // Mengirim data produk ke view untuk ditampilkan
        return view('product', compact('products'));
    }

        // Method untuk menampilkan detail produk berdasarkan ID
        public function detail(string $id) {
            // Mengambil data produk berdasarkan ID
            $product = Product::find($id);
    
            // Memeriksa apakah produk ditemukan
            if (!$product) {
                abort(404, 'Product not found');
            }
            
            // Mengirim data produk ke view untuk ditampilkan
            return view('product.detailProduct', compact('product'));
        }
}