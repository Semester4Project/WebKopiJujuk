<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Pastikan ini sesuai dengan primary key kategori

    protected $fillable = [
        'name'
    ];

        // Definisi relasi ke model Product
        public function products()
        {
            return $this->hasMany(Product::class, 'id_kategori', 'id_kategori');
            // Jika primary key di categories adalah 'id_kategori', gunakan 'id_kategori' sebagai argumen ketiga
        }
}
