<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil beberapa data kategori
        $categories = Category::all();

        // Tambahkan beberapa data produk untuk setiap kategori
        foreach ($categories as $category) {
            Product::create([
                'nama_produk' => 'Produk ' . $category->id,
                'id_kategori' => $category->id_kategori,
                'deskripsi' => 'Deskripsi produk ' . $category->id,
                'berat' => rand(100, 1000),
                'harga' => rand(10000, 100000),
                'foto' => null, // Tambahkan path foto jika ada
            ]);
        }
    }
}