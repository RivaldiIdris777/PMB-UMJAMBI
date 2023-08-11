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
            $table->integer('admin_validasi')->nullable()->after('email_validasi');
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
            Schema::dropIfExists('admin_validasi');
        });
    }
};
