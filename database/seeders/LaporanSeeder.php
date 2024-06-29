<?php



// database/seeders/LaporanSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan;
use Carbon\Carbon;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDate = Carbon::now()->subMonths(1);
        $endDate = Carbon::now();

        while ($startDate->lte($endDate)) {
            Laporan::create([
                'tanggal' => $startDate->toDateString(),
                'produk' => 'Produk ' . rand(1, 5), // Menghasilkan produk acak
                'pendapatan' => rand(1000, 10000), // Menghasilkan pendapatan acak
            ]);

            $startDate->addDay();
        }
    }
}
