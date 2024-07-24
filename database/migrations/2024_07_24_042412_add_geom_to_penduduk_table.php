<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement('ALTER TABLE penduduk ADD COLUMN geom geometry(Point,4326);');
    }

    public function down()
    {
        DB::statement('ALTER TABLE penduduk DROP COLUMN geom RESTRICT;');
    }
};
