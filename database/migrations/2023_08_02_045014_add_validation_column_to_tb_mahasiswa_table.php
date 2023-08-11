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
        Schema::table('tb_mahasiswa', function (Blueprint $table) {
            $table->timestamp('tgl_validasi')->after('id_dokumen')->nullable();
            $table->enum('status_validasi', ['Y', 'N'])->default('N')->after('tgl_validasi');
            $table->integer('admin_validasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_mahasiswa', function (Blueprint $table) {
            Schema::dropIfExists('tgl_validasi');
            Schema::dropIfExists('status_validasi');
            Schema::dropIfExists('admin_validasi');
        });
    }
};
