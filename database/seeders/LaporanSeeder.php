<?php

// database/seeders/LaporanSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Laporan;
use Carbon\Carbon;

class LaporanSeeder extends Seeder
{
    public function run()
    {
        $tanggal = Carbon::now()->subDays(30);

        for ($i = 0; $i < 30; $i++) {
            Laporan::create([
                'tanggal' => $tanggal->copy()->addDays($i),
                'produk' => 'Produk ' . ($i + 1),
                'pendapatan' => rand(100000, 1000000)
            ]);
        }
    }
}

