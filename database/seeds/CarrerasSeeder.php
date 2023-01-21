<?php

use Illuminate\Database\Seeder;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      DB::table('carreras')->insert(['car_siglas'=>'SOF','car_nombre'=>'DESARROLLO DE SOFTWARE']);
      DB::table('carreras')->insert(['car_siglas'=>'MCA','car_nombre'=>'MECÁNICA AUTOMOTRIZ']);
      DB::table('carreras')->insert(['car_siglas'=>'ENF','car_nombre'=>'ENFERMERÍA']);
      DB::table('carreras')->insert(['car_siglas'=>'MRK','car_nombre'=>'MARKETING']);
      DB::table('carreras')->insert(['car_siglas'=>'TRB','car_nombre'=>'TRIBUTACIÓN']);
      DB::table('carreras')->insert(['car_siglas'=>'CME','car_nombre'=>'COMERCIO EXTERIOR']);
      DB::table('carreras')->insert(['car_siglas'=>'GST','car_nombre'=>'GASTRONIMIA']);
      DB::table('carreras')->insert(['car_siglas'=>'ADM','car_nombre'=>'ADMINISTRACIÓN']);
      DB::table('carreras')->insert(['car_siglas'=>'EMC','car_nombre'=>'ELECTRO MECÁNICA']);
      DB::table('carreras')->insert(['car_siglas'=>'TUR','car_nombre'=>'TURISMO']);
      DB::table('carreras')->insert(['car_siglas'=>'DIE','car_nombre'=>'DIETÉTICA']);
      DB::table('carreras')->insert(['car_siglas'=>'HOT','car_nombre'=>'HOTELERÍA']);
      DB::table('carreras')->insert(['car_siglas'=>'GTH','car_nombre'=>'GESTIÓN DE TALENTO HUMANO']);
      DB::table('carreras')->insert(['car_siglas'=>'MKD','car_nombre'=>'MARKETING DIGITAL']);

    }
}
