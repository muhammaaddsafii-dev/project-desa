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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();     
            $table->text('lokasi_dan_geografi')->nullable();     
            $table->text('penduduk_dan_demografi')->nullable();     
            $table->text('potensi_dan_sumberdaya')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('email')->nullable();
            $table->string('kontak')->nullable();
            $table->string('header_image')->nullable();
            $table->string('header_video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
