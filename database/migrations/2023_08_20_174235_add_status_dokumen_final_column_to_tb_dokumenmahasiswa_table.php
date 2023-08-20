<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_dokumenmahasiswa', function (Blueprint $table) {
            $table->enum('status_dokumen_final', ['diterima', 'belum_diterima'])->default('belum_diterima')->after('dokumen_pendukung_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_dokumenmahasiswa', function (Blueprint $table) {
            Schema::dropIfExists('status_dokumen_final');
        });
    }
};
