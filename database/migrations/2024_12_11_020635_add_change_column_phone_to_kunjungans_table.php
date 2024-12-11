<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChangeColumnPhoneToKunjungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kunjungans', function (Blueprint $table) {
            //
            $table->dateTime('dt_kunjungan')->change();
            $table->dateTime('dt_realisasi_kunjungan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kunjungans', function (Blueprint $table) {
            //
        });
    }
}
