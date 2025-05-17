<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stok'; // nama tabel di database sebenarnya

    // Jika kolom 'id' bukan primary key atau tidak auto increment, atur juga di sini.

    protected $fillable = ['nama_produk','harga']; // sesuaikan kolom yang bisa diisi
}