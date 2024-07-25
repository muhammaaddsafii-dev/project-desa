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
            $table->string('Nomor');
            $table->string('Foto')->nullable();
            $table->string('Nama_Kepal')->nullable();
            $table->string('Jenis_Kela')->nullable();
            $table->string('Status_Tem')->nullable();
            $table->string('Luas_Lanta')->nullable();
            $table->string('Jenis_Lant')->nullable();
            $table->string('Jenis_Dind')->nullable();
            $table->string('Fasilitas_')->nullable();
            $table->string('Fasilitas1')->nullable();
            $table->string('Fasilita_1')->nullable();
            $table->string('Bahan_Baka')->nullable();
            $table->string('Kartu_Jami')->nullable();
            $table->string('Akses_Info')->nullable();
            $table->string('RT')->nullable();
            $table->string('RW')->nullable();
            $table->text('Keterangan')->nullable();
            $table->string('Profesi_KK')->nullable();
            $table->string('NIK')->nullable();
            $table->string('DATA')->nullable();
            $table->string('Jumlah_KK')->nullable();
            $table->string('SUMBER')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
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
