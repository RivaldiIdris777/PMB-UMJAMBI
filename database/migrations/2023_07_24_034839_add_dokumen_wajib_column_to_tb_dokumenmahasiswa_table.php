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
            $table->string('dokumen_wajib')->nullable()->after('d_kk');
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
            Schema::dropIfExists('dokumen_wajib');
        });
    }
};
