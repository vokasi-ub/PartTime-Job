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
            $table->unsignedBigInteger('id_BadanUsaha');
            $table->foreign('id_BadanUsaha')->references('id_BadanUsaha')->on('badan_usaha')->onDelete('CASCADE');
            $table->string('posisi', 50);
            $table->string('jam_Kerja', 10);
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
