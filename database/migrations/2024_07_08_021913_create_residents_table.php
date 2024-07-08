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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('kks_id')->constrained('kks')->onDelete('cascade');
            $table->foreignId('rts_id')->constrained('rts')->onDelete('cascade');
            $table->foreignId('rws_id')->constrained('rws')->onDelete('cascade');
            $table->string('nik');
            $table->string('status_hubungan')->nullable();
            $table->string('status_perkawinan');
            $table->string('jenis_kelamin');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->decimal('penghasilan_per_bulan', 10, 2)->nullable();
            $table->date('tanggal_lahir');
            $table->string('whatsapp')->nullable();
            $table->string('kepemilikan_harta_lancar')->nullable();
            $table->string('kemampuan_konsumsi')->nullable();
            $table->string('rasio_pengeluaran_pangan')->nullable();
            $table->string('jenis_konsumsi')->nullable();
            $table->string('kemampuan_membeli_pakaian')->nullable();
            $table->string('status_tempat_tinggal')->nullable();
            $table->string('luas_lantai')->nullable();
            $table->string('jenis_lantai')->nullable();
            $table->string('jenis_dinding')->nullable();
            $table->string('fasilitas_mck')->nullable();
            $table->string('fasilitas_ipal')->nullable();
            $table->string('fasilitas_energi_penerangan')->nullable();
            $table->string('fasilitas_air_minum')->nullable();
            $table->string('bahan_bakar')->nullable();
            $table->string('kartu_jaminan_kesehatan')->nullable();
            $table->string('kemampuan_berobat')->nullable();
            $table->string('akses_informasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
