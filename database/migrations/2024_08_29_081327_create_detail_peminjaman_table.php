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
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->integer('id_peminjaman');
            $table->string('kode_buku', 13);
            $table->integer('jumlah');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_peminjaman')->references('id')->on('peminjamans');
            $table->foreign('kode_buku')->references('kode_buku')->on('bukus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman');
    }
};
