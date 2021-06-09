<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateJenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS jenis (
                id_jenis int(11) NOT NULL,
                nama tinytext NOT NULL
            );
        ");

        DB::statement("ALTER TABLE jenis CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        DB::statement("
            INSERT INTO jenis (id_jenis, nama) VALUES
            (1, 'kabupaten'),
            (2, 'kota'),
            (3, 'kelurahan'),
            (4, 'desa');
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis');
    }
}
