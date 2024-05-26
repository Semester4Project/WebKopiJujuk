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
            'id_kategori' => 'required', // Pastikan sesuai dengan nama field di database
            'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk multiple files
            'deskripsi' => 'required',
            'berat' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        // Simpan data ke database
        $product = new Product();
        $product->nama_produk = $request->nama_produk;
        $product->id_kategori = $request->id_kategori; // Pastikan sesuai dengan nama field di database
        $product->deskripsi = $request->deskripsi;
        $product->berat = $request->berat;
        $product->harga = $request->harga;

        // Upload gambar
        if ($request->hasFile('foto')) {
            // Inisialisasi array untuk menyimpan nama file yang diunggah
            $imageNames = [];
        
            // Ambil semua file yang diunggah dengan nama input 'foto'
            $files = $request->file('foto');
        
            foreach ($files as $file) {
                // Membuat nama file unik dengan timestamp dan ekstensi asli
                $imageName = time().'_'.$file->getClientOriginalName();
                
                // Memindahkan file ke direktori public/images
                $file->move(public_path('images'), $imageName);
                
                // Menyimpan nama file ke dalam array
                $imageNames[] = $imageName;
            }
        
            // Menyimpan nama file ke dalam model produk sebagai JSON string
            $product->foto = json_encode($imageNames);
        } else {
            return response()->json(['message' => 'No files uploaded'], 400);
        }

        // Menyimpan model produk
        $product->save();

        return redirect()->route('listproduct')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show($id)
{
    $product = Product::with('category')->findOrFail($id);
    return view('product.detailProduct', compact('product'));
}

}