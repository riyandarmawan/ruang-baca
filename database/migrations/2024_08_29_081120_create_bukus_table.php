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
        Schema::create('bukus', function (Blueprint $table) {
            $table->string('kode_buku', 16)->nullable();
            $table->string('judul', 50)->nullable();
            $table->string('penerbit', 30)->nullable();
            $table->year('tahun_terbit')->nullable();
            $table->timestamps();

            $table->primary('kode_buku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
