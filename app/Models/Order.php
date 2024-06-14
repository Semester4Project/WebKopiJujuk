<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders'; // Sesuaikan dengan nama tabel di database Anda

    protected $fillable = [
        'order_id',
        'customer',
        'harga',
        'status'
        // Tambahkan kolom lain yang ingin Anda gunakan
    ];

    // Definisikan status color berdasarkan status
    public function getStatusColorAttribute()
    {
        switch ($this->status) {
            case 'Delivered':
                return 'success';
            case 'Shipping':
                return 'warning';
            case 'Pending':
                return 'danger';
            case 'Processing':
                return 'info';
            default:
                return 'secondary';
        }
    }
}
