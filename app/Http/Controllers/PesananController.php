<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Order;
use App\Models\Pesanan;
use App\Models\Product;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function PesananBaru() {
        // Mengambil data pesanan dan informasi pelanggan yang terkait
        $orders = DB::table('orders')
                ->join('carts', 'orders.id_carts', '=', 'carts.id_carts')
                ->join('products', 'carts.id_product', '=', 'products.id_product')
                ->join('users', 'carts.user_id', '=', 'users.user_id')
                ->select('orders.order_id', 'users.username as customer', 'products.harga', 'orders.status_pesanan')
                ->where('orders.status_pesanan', '=', 'Pesanan Baru')
                ->get();

        // Kirim data pesanan ke view
        return view('pesanan.pesananbaru', compact('orders'));
    }

    public function PesananSiapDikirim() {
        $orders = DB::table('orders')
                ->join('carts', 'orders.id_carts', '=', 'carts.id_carts')
                ->join('products', 'carts.id_product', '=', 'products.id_product')
                ->join('users', 'carts.user_id', '=', 'users.user_id')
                ->select('orders.order_id', 'users.username as customer', 'products.harga', 'orders.status_pesanan')
                ->where('orders.status_pesanan', '=', 'Pesanan Siap Dikirim')
                ->get();

    return view('pesanan.pesananSiapDikirim', ['orders' => $orders]);
}

    public function PesananDikirim() {
        $orders = DB::table('orders')
                ->join('carts', 'orders.id_carts', '=', 'carts.id_carts')
                ->join('products', 'carts.id_product', '=', 'products.id_product')
                ->join('users', 'carts.user_id', '=', 'users.user_id')
                ->select('orders.order_id', 'users.username as customer', 'products.harga', 'orders.status_pesanan')
                ->where('orders.status_pesanan', '=', 'Pesanan Di Kirim')
                ->get();

    return view('pesanan.pesananDikirim', ['orders' => $orders]);
}

    public function PesananSelesai() {
        $orders = DB::table('orders')
                ->join('carts', 'orders.id_carts', '=', 'carts.id_carts')
                ->join('products', 'carts.id_product', '=', 'products.id_product')
                ->join('users', 'carts.user_id', '=', 'users.user_id')
                ->select('orders.order_id', 'users.username as customer', 'products.harga', 'orders.status_pesanan')
                ->where('orders.status_pesanan', '=', 'Pesanan Selesai')
                ->get();

    return view('pesanan.pesananSelesai', ['orders' => $orders]);
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
