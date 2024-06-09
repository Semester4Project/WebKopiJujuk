<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan'; // Nama tabel dalam database

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'tanggal',
        'keterangan',
        // tambahkan kolom lain sesuai kebutuhan
    ];

    // Jika kolom 'created_at' dan 'updated_at' tidak ada di tabel
    public $timestamps = false;
}
