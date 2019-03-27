<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->bigIncrements('id_Pekerjaan');
            $table->integer('id_BadanUsaha');
            $table->string('nama_BadanUsaha', 50);
            $table->string('alamat', 50);
            $table->string('posisi', 50);
            $table->string('paruh_Waktu', 10);
            $table->text('persyaratan');
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
        Schema::dropIfExists('pekerjaan');
    }
}