<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadanUsahaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badan_usaha', function (Blueprint $table) {
            $table->bigIncrements('id_BadanUsaha');
            $table->integer('id');
            $table->string('nama_BadanUsaha', 50);
            $table->string('alamat', 50);
            $table->string('nomor_telp', 50);
            $table->string('website', 50);
            $table->date('tgl_Berdiri');
            $table->string('email', 30);
            $table->string('social_Media', 50);                                         
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
        Schema::dropIfExists('badan_usaha');
    }
}
