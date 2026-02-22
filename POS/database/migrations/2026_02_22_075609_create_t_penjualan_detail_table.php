<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    
    Schema::table('t_penjualan_detail', function (Blueprint $table) {
        $table->foreign('barang_id')
              ->references('barang_id')
              ->on('m_barang');
    });
}

public function down(): void
{
    Schema::table('t_penjualan_detail', function (Blueprint $table) {
        $table->dropForeign(['barang_id']);
        $table->dropForeign(['penjualan_id']);
        $table->dropColumn(['harga', 'jumlah', 'barang_id', 'penjualan_id']);
    });
}
};
