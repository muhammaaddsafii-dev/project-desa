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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->nullable();
            $table->string('foto')->nullable();
            $table->string('nama_kepal')->nullable();
            $table->string('jenis_kela')->nullable();
            $table->string('status_tem')->nullable();
            $table->string('luas_lanta')->nullable();
            $table->string('jenis_lant')->nullable();
            $table->string('jenis_dind')->nullable();
            $table->string('fasilitas_')->nullable();
            $table->string('fasilitas1')->nullable();
            $table->string('fasilita_1')->nullable();
            $table->string('bahan_baka')->nullable();
            $table->string('kartu_jami')->nullable();
            $table->string('akses_info')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('profesi_kk')->nullable();
            $table->string('nik')->nullable();
            $table->string('data')->nullable();
            $table->string('jumlah_kk')->nullable();
            $table->string('sumber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
