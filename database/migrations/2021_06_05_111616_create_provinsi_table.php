<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::Statement("
            CREATE TABLE IF NOT EXISTS provinsi (
                id_prov char(2) NOT NULL,
                nama tinytext NOT NULL,
                PRIMARY KEY (id_prov)
            );
        ");

        DB::statement("ALTER TABLE provinsi CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        DB::statement("
            INSERT INTO provinsi (id_prov, nama) VALUES
            ('11', 'Aceh'),
            ('12', 'Sumatera Utara'),
            ('13', 'Sumatera Barat'),
            ('14', 'Riau'),
            ('15', 'Jambi'),
            ('16', 'Sumatera Selatan'),
            ('17', 'Bengkulu'),
            ('18', 'Lampung'),
            ('19', 'Kepulauan Bangka Belitung'),
            ('21', 'Kepulauan Riau'),
            ('31', 'DKI Jakarta'),
            ('32', 'Jawa Barat'),
            ('33', 'Jawa Tengah'),
            ('34', 'DI Yogyakarta'),
            ('35', 'Jawa Timur'),
            ('36', 'Banten'),
            ('51', 'Bali'),
            ('52', 'Nusa Tenggara Barat'),
            ('53', 'Nusa Tenggara Timur'),
            ('61', 'Kalimantan Barat'),
            ('62', 'Kalimantan Tengah'),
            ('63', 'Kalimantan Selatan'),
            ('64', 'Kalimantan Timur'),
            ('65', 'Kalimantan Utara'),
            ('71', 'Sulawesi Utara'),
            ('72', 'Sulawesi Tengah'),
            ('73', 'Sulawesi Selatan'),
            ('74', 'Sulawesi Tenggara'),
            ('75', 'Gorontalo'),
            ('76', 'Sulawesi Barat'),
            ('81', 'Maluku'),
            ('82', 'Maluku Utara'),
            ('92', 'Papua'),
            ('91', 'Papua Barat');
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinsi');
    }
}
