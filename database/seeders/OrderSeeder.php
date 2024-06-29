<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'order_id' => 1,
                'status_pesanan' => 'Pesanan Baru',
                'tanggal_pesan' => now(),
                'total_pembayaran' => 20000,
                'id_carts' => 1,
            ],
            [
                'order_id' => 2,
                'status_pesanan' => 'Pesanan Siap Dikirim',
                'tanggal_pesan' => now(),
                'total_pembayaran' => 20000,
                'id_carts' => 2,
            ],
            [
                'order_id' => 3,
                'status_pesanan' => 'Pesanan Di Kirim',
                'tanggal_pesan' => now(),
                'total_pembayaran' => 10000,
                'id_carts' => 1,
            ],
            [
                'order_id' => 4,
                'status_pesanan' => 'Pesanan Selesai',
                'tanggal_pesan' => now(),
                'total_pembayaran' => 10000,
                'id_carts' => 2,
            ],
        ]);
    }
}