<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run()
    {
        DB::table('carts')->insert([
            [
                'id_carts' => 1,
                'jumlah_barang' => 2,
                'id_product' => 1,
                'user_id' => 1,
            ],
            [
                'id_carts' => 2,
                'jumlah_barang' => 1,
                'id_product' => 2,
                'user_id' => 2,
            ],
        ]);
    }
}
