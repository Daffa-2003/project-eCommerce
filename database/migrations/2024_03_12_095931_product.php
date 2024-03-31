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
        Schema::create('product', function(Blueprint $table){
            $table ->id();
            $table ->string('sku');
            $table ->string('name');
            $table ->string('type');
            $table ->string('kategori');
            $table ->bigInteger('harga');
            $table ->float('discount');
            $table ->integer('quantity');
            $table ->string('foto');
            $table ->boolean('is_active')->default(1);
            $table ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
