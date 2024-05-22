<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function PesananBaru() {
        return view('pesanan.pesananbaru');
    }

    public function PesananSiapDikirim() {
        return view('pesanan.pesananSiapDikirim');
    }

    public function PesananDikirim() {
        return view('pesanan.pesananDikirim');
    }

    public function PesananSelesai() {
        return view('pesanan.pesananSelesai');
    }
}
