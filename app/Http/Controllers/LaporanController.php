<?php

// app/Http/Controllers/LaporanController.php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = $request->input('tanggalAwal', date('Y-m-01'));
        $tanggalAkhir = $request->input('tanggalAkhir', date('Y-m-d'));

        $laporan = Laporan::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();

        return view('fitur.index', compact('laporan', 'tanggalAwal', 'tanggalAkhir'));
    }

    public function exportPDF(Request $request)
    {
        $tanggalAwal = $request->get('tanggalAwal', date('Y-m-01'));
        $tanggalAkhir = $request->get('tanggalAkhir', date('Y-m-d'));

        $laporan = Laporan::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();

        $pdf = PDF::loadView('fitur.pdf', compact('laporan', 'tanggalAwal', 'tanggalAkhir'));

        return $pdf->download('laporan-penjualan.pdf');
    }
}
