<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
            'stock' => 'required|integer',
        ]);

        // Simpan data ke database
        $product = new Product();
        $product->nama_produk = $request->nama_produk;
        $product->id_kategori = $request->id_kategori; // Pastikan sesuai dengan nama field di database
        $product->deskripsi = $request->deskripsi;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stock = $request->stock;

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

public function edit($id_product)
{
    $product = Product::findOrFail($id_product);
    $categories = Category::all();

    return view('product.editProduct', compact('product', 'categories'));
}

public function update(Request $request, $id_product)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required|integer|exists:categories,id_kategori',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'berat' => 'required|integer',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the product by ID
        $product = Product::findOrFail($id_product);

        // Update product fields
        $product->nama_produk = $request->nama_produk;
        $product->id_kategori = $request->id_kategori;
        $product->deskripsi = $request->deskripsi;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stock = $request->stock;

        // Handle file upload for product images
        if ($request->hasFile('foto')) {
            // Delete old images if they exist
            if ($product->foto) {
                foreach (json_decode($product->foto) as $foto) {
                    Storage::delete('public/images/' . $foto);
                }
            }

            $images = [];
            foreach ($request->file('foto') as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/images', $imageName);
                $images[] = $imageName;
            }
            $product->foto = json_encode($images);
        }

        $product->save();

        return redirect()->route('listproduct')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id_product) {
            // Temukan produk berdasarkan ID
    $product = Product::findOrFail($id_product);

    // Hapus gambar yang terkait (jika ada)
    if ($product->foto) {
        foreach (json_decode($product->foto) as $foto) {
            Storage::delete('public/images/' . $foto);
        }
    }

    // Hapus produk dari database
    $product->delete();

    // Redirect ke daftar produk dengan pesan sukses
    return redirect()->route('listproduct')->with('success', 'Produk berhasil dihapus.');
    }

}