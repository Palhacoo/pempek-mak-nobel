<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('stok_id');
        $table->string('nama_produk'); // untuk menyimpan nama dari stok
        $table->integer('harga');
        $table->integer('jumlah');
        $table->timestamps();

        // Foreign key
        $table->foreign('stok_id')->references('id')->on('stok')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
