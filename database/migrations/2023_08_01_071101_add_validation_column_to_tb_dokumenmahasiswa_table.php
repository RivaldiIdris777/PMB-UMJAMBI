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
            $table->timestamp('tgl_upload_ktp')->after('d_ktp')->nullable();
            $table->timestamp('tgl_validasi_ktp')->after('tgl_upload_ktp')->nullable();
            $table->enum('ktp_status', ['Y', 'N'])->default('N')->after('tgl_validasi_ktp');
            $table->timestamp('tgl_upload_kk')->after('d_kk')->nullable();
            $table->timestamp('tgl_validasi_kk')->after('tgl_upload_kk')->nullable();
            $table->enum('kk_status', ['Y', 'N'])->default('N')->after('tgl_validasi_kk');
            $table->timestamp('tgl_upload_dokumen_wajib')->after('dokumen_wajib')->nullable();
            $table->timestamp('tgl_validasi_dokumen_wajib')->after('tgl_upload_dokumen_wajib')->nullable();
            $table->enum('dokumen_wajib_status', ['Y', 'N'])->default('N')->after('tgl_validasi_dokumen_wajib');
            $table->timestamp('tgl_upload_dokumen_pendukung')->after('dokumen_pendukung')->nullable();
            $table->timestamp('tgl_validasi_dokumen_pendukung')->after('tgl_upload_dokumen_pendukung')->nullable();
            $table->enum('dokumen_pendukung_status', ['Y', 'N'])->default('N')->after('tgl_validasi_dokumen_pendukung');

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
            Schema::dropIfExists('tgl_upload_ktp');
            Schema::dropIfExists('tgl_upload_kk');
            Schema::dropIfExists('tgl_upload_dokumen_wajib');
            Schema::dropIfExists('tgl_upload_dokumen_pendukung');
            Schema::dropIfExists('tgl_validasi_ktp');
            Schema::dropIfExists('tgl_validasi_kk');
            Schema::dropIfExists('tgl_validasi_dokumen_wajib');
            Schema::dropIfExists('tgl_validasi_dokumen_pendukung');
            Schema::dropIfExists('ktp_status');
            Schema::dropIfExists('kk_status');
            Schema::dropIfExists('dokumen_wajib_status');
            Schema::dropIfExists('dokumen_pendukung_status');

        });
    }
};
