<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'id_product' => 1,
                'nama_produk' => 'Product 1',
                'id_kategori' => 1,
                'deskripsi' => 'Description of Product 1',
                'berat' => 500,
                'stock' => 100,
                'harga' => 10000,
                'foto' => 'product1.jpg',
            ],
            [
                'id_product' => 2,
                'nama_produk' => 'Product 2',
                'id_kategori' => 2,
                'deskripsi' => 'Description of Product 2',
                'berat' => 1000,
                'stock' => 50,
                'harga' => 20000,
                'foto' => 'product2.jpg',
            ],
        ]);
    }
}