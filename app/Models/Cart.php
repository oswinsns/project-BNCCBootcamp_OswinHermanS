<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
       'user_id',
       'barang_id',
       'quantity',
       'Almt_Pengiriman',
       'Kode_pos',
    ];

    public function barang() {
        return $this->belongsTo(barang::class, 'barang_id');
    }

    public function pembeli() {
        return $this->belongsTo(User::class, 'user_id');
    }


}
