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
            $table->char('kode_buku', 13);
            $table->string('sampul', 100);
            $table->string('slug', 55)->unique();
            $table->string('judul', 50);
            $table->string('penulis', 30);
            $table->string('penerbit', 30);
            $table->year('tahun_terbit');
            $table->integer('jumlah_halaman');
            $table->integer('kategori_id');
            $table->text('deskripsi');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('kode_buku');
            $table->foreign('kategori_id')->references('id')->on('kategoris');
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
