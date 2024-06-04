<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Keranjang;

class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Keranjang::create([
            'id_keranjang' => 'KRNJ001',
            'jumlah_barang' => 2,
            'id_produk' => 'PROD001',
            'id_user' => 'USR001',
        ]);
    }
}
