<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        // Nama tabel jika berbeda dari 'products'
        protected $table = 'products';

        // Nama kolom primary key jika berbeda dari 'id'
        protected $primaryKey = 'id_product';
    
        // Jika primary key bukan auto-incrementing
        public $incrementing = false;
    
        // Jika primary key bukan tipe integer
        protected $keyType = 'string';

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
