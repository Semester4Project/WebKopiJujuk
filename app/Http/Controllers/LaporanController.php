<?php

// app/Http/Controllers/LaporanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = $request->input('tanggalAwal', date('Y-m-01'));
        $tanggalAkhir = $request->input('tanggalAkhir', date('Y-m-d'));

        $laporan = Laporan::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();

        return view('fitur.index', compact('laporan', 'tanggalAwal', 'tanggalAkhir'));
    }
}


