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
        Schema::create('fasum', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('jenis');
            $table->string('objek')->nullable();
            $table->string('toponim');
            $table->string('sumber');
            $table->string('keterangan');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasum');
    }
};
