<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductApi extends Controller
{
    // Method untuk menampilkan daftar produk dan kategori
    public function listProductsAndCategories() {
        // Mengambil semua data produk beserta relasinya dengan kategori
        $products = Product::with('category')->get();
        
        // Mengambil semua data kategori
        $categories = Category::all();

        // Mengirim data produk dan kategori sebagai respon JSON
        return response()->json([
            'status' => true,
            'products' => $products,
            'categories' => $categories
        ], 200);
    }

    // Metode lainnya
    public function listProduct() {
        $products = Product::with('category')->get();
        return response()->json([
            'status' => true,
            'data' => $products
        ], 200);
    }

    public function detail($id) {
        $product = Product::with('category')->find($id);
        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ], 404);
        }
        return response()->json([
            'status' => true,
            'data' => $product
        ], 200);
    }

    public function listCategories() {
        $categories = Category::all();
        return response()->json([
            'status' => true,
            'data' => $categories
        ], 200);
    }
}
