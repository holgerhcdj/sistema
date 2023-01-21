<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('hor_id');
            $table->foreignId('car_id')->references('car_id')->on('carreras');
            $table->foreignId('cur_id')->references('cur_id')->on('cursos');
            $table->foreignId('mat_id')->references('mat_id')->on('materias');
            $table->foreignId('usu_id')->references('id')->on('users'); /////DOCENTE
            $table->integer('hor_dia');
            $table->integer('hor_hora');
            $table->string('hor_paralelo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
