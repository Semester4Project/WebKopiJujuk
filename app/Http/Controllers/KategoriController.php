<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function addkategori()
    {
        $categories = Category::all(); // Ambil semua data kategori dari database
        return view('fitur.kategori', compact('categories')); // Kirim data kategori ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('addkategori')
                         ->with('success', 'Category created successfully.');
    }
}
