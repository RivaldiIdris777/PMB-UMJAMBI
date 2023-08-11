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
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable();
            $table->bigInteger('jumlah_pembayaran')->nullable();
            $table->string('terbilang')->nullable();
            $table->string('berkas')->nullable();
            $table->integer('id_program_kuliah')->nullable();
            $table->integer('id_prodi')->nullable();
            $table->timestamp('tanggal_upload')->nullable();
            $table->timestamp('tanggal_validasi')->nullable();
            $table->enum('status_validasi', ['Y','N'])->nullable();
            $table->string('operator_validasi')->nullable();
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
        Schema::dropIfExists('tb_transaksi');
    }
};
