<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('stok', function (Blueprint $table) {
            $table->dropColumn('jumlah_stok');
        });
    }

    public function down()
    {
        Schema::table('stok', function (Blueprint $table) {
            $table->integer('jumlah_stok')->after('nama_produk');
        });
    }
};
