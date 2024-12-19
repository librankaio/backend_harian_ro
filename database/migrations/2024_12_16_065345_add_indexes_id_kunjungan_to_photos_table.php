<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesIdKunjunganToPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('kunjungan_id')->change();
            $table->index(['kunjungan_id']);
            // $table->engine = 'InnoDB';
            $table->foreign('kunjungan_id')
              ->references('id')
              ->on('kunjungans')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            //
        });
    }
}
