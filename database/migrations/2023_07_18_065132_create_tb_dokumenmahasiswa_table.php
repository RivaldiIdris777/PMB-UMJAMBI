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
        Schema::create('tb_dokumenmahasiswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_mahasiswa')->nullable();
            $table->bigInteger('nik')->nullable();
            $table->string('d_ktp')->nullable();
            $table->string('d_nik')->nullable();
            $table->string('d_kk')->nullable();
            $table->string('dokumen_pendukung')->nullable();
            $table->enum('status_kelengkapan', ['lengkap', 'tidak_lengkap'])->default('tidak_lengkap');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_dokumenmahasiswa');
    }
};
