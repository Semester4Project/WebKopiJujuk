<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ListProductController extends Controller
{
    // Method untuk menampilkan daftar produk
    public function listProduct() {
        // Mengambil semua data produk dari database
        $products = Product::with('category')->get();
    
        // Mengirim data produk ke view untuk ditampilkan
        return view('product', compact('products'));
    }

    // Method untuk menampilkan detail produk berdasarkan ID
    public function detail(string $id) {
        // Mengambil data produk berdasarkan ID dengan relasi kategori
        $product = Product::with('category')->find($id);
    
        // Ubah data gambar produk menjadi array
        $images = [];
        if ($product->foto) {
            $images = json_decode($product->foto);
        }
        
        // Memeriksa apakah produk ditemukan
        if (!$product) {
            abort(404, 'Product not found');
        }
        
        // Mengirim data produk ke view untuk ditampilkan
        return view('product.detailProduct', compact('product'));
    }
}