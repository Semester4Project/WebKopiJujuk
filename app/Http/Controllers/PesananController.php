<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesanan;
use Carbon\Carbon;
use App\Models\Keranjang;
use App\Models\User;
use App\Models\Product;

class PesananController extends Controller
{
    public function PesananBaru() {
        $pesananBaru = Pesanan::where('status_pesanan', 'Pesanan Baru')->get();
        return view('pesanan.pesananbaru', compact('pesananBaru'));
    }

    public function PesananSiapDikirim() {
        $pesananSiapDikirim = Pesanan::where('status_pesanan', 'Pesanan Siap Dikirim')->get();
        return view('pesanan.pesananSiapDikirim', compact('pesananSiapDikrim'));
    }

    public function PesananDikirim() {
        $pesananDikirim = Pesanan::where('status_pesanan', 'Pesanan Dikirim')->get();
        return view('pesanan.pesananDikirim', compact('pesananDikrim'));
    }

    public function PesananSelesai() {
        $pesananSelesai = Pesanan::where('status_pesanan', 'Pesanan Selesai')->get();
        return view('pesanan.pesananSelesai', compact('pesananSelesai'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::with(['keranjang.produk', 'keranjang.user'])->findOrFail($id);

        return view('pesanan.pesanandetail', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status_pesanan = $request->input('status_pesanan');
        $pesanan->save();

        return back();
    }
}
