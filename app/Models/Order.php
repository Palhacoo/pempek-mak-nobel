<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['stok_id', 'nama_produk', 'harga', 'jumlah'];

    public function stok()
{
    
    return $this->belongsTo(Stok::class, 'stok_id');
}

// app/Models/Order.php
public function pelanggan()
{
    return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
}


}
