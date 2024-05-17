<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function addProduct()
    {
        $categories = Category::all();
        return view('fitur.tambahproduk', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'nama_produk' => 'required',
            'id_kategori' => 'required', // Ubah id_kategori menjadi kategori_id
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
            'berat' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        // Simpan data ke database
        $product = new Product();
        $product->nama_produk = $request->nama_produk;
        $product->id_kategori = $request->id_kategori; // Ubah id_kategori menjadi kategori_id
        $product->deskripsi = $request->deskripsi;
        $product->berat = $request->berat;
        $product->harga = $request->harga;

        // Upload gambar
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $product->foto = $imageName;
        }

        $product->save();

        return redirect()->route('listproduct')->with('success', 'Produk berhasil ditambahkan.');
    }
}