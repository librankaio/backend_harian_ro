<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama_user', 128);
            $table->date('dt_kunjungan');
            $table->date('dt_realisasi_kunjungan')->nullable();
            $table->string('lokasi_kunjungan', 128);
            $table->string('geo_loc', 256);
            $table->string('nama_client', 128);
            $table->string('phone_client', 32)->nullable();
            $table->string('jenis_kunjungan', 64);
            $table->string('todo', 256)->nullable();
            $table->string('stat_perencanaan', 1)->nullable();
            $table->string('stat_kunjungan', 1)->nullable();
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
        Schema::dropIfExists('kunjungans');
    }
}
