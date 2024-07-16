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
        // Ubah tipe data kolom 'data' menjadi JSONB
        Schema::table('notifications', function (Blueprint $table) {
            // Menggunakan raw DB statement untuk mengubah tipe kolom ke JSONB
            DB::statement('ALTER TABLE notifications ALTER COLUMN data TYPE JSONB USING data::JSONB');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         // Ubah kembali tipe data kolom 'data' menjadi text
         Schema::table('notifications', function (Blueprint $table) {
            DB::statement('ALTER TABLE notifications ALTER COLUMN data TYPE TEXT USING data::TEXT');
        });
    }
};
