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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('code_transaksi');
            $table->string('total_qty');
            $table->bigInteger('total_harga');
            $table->string('nama_pembeli');
            $table->string('alamat');
            $table->string('no_tlp');
            $table->string('ekspedisi');
            $table->bigInteger('ongkir');
            $table->bigInteger('bayar');
            $table->bigInteger('kembali');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
