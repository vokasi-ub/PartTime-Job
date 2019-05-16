<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLamaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamaran', function (Blueprint $table) {
            $table->bigIncrements('id_Lamaran');
            $table->unsignedBigInteger('id_Pekerjaan');
            $table->foreign('id_Pekerjaan')->references('id_Pekerjaan')->on('pekerjaan')->onDelete('CASCADE');
            $table->unsignedBigInteger('id_BadanUsaha');
            $table->foreign('id_BadanUsaha')->references('id_BadanUsaha')->on('badan_usaha')->onDelete('CASCADE');
            $table->string('nama', 30);
            $table->string('email', 50);
            $table->string('phone', 30);
            $table->string('alamat', 100);
            $table->string('foto', 200);
            $table->string('ktp', 200);
            $table->string('skck', 200);
            $table->string('ktm', 200);
            $table->string('sks', 200);
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
        Schema::dropIfExists('lamaran');
    }
}
