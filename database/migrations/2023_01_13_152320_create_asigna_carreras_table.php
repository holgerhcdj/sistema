<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asigna_carreras', function (Blueprint $table) {
            $table->id('asc_id');
            $table->foreignId('usu_id')->references('id')->on('users');
            $table->foreignId('car_id')->references('car_id')->on('carreras');
            $table->date('asc_fecha');
            $table->string('asc_observaciones')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asigna_carreras');
    }
}
