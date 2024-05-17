<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'id_kategori',
        'deskripsi',
        'berat',
        'harga',
        'foto',
    ];

    // Definisi relasi ke model Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }
}
