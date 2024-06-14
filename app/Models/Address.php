<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penerima',
        'no_telepon',
        'kode_pos',
        'alamat_lengkap',
        'user_id',
    ];
}
