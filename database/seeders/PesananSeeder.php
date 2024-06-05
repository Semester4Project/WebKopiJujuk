<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pesanan;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pesanan::create([
            'id_pesanan' => 'PSN001',
            'tanggal_pesanan' => now(),
            'status_pesanan' => 'Pesanan Baru',
            'total_pembayaran' => 200000,
            'id_keranjang' => 'KRNJ001',
        ]);
    }
}
