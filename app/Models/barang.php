<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'jumlah_barang',
        'category_id',
        'image',
    ];

    
    public function kategori(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
