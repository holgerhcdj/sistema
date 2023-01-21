<?php

use Illuminate\Database\Seeder;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('materias')->insert(['mat_descripcion'=>'DISEÑO WEB','mat_area'=>'TECNICA']);
        DB::table('materias')->insert(['mat_descripcion'=>'ALGORITMOS','mat_area'=>'TECNICA']);
        DB::table('materias')->insert(['mat_descripcion'=>'BASE DE DATOS','mat_area'=>'TECNICA']);
        DB::table('materias')->insert(['mat_descripcion'=>'FRONT-END','mat_area'=>'TECNICA']);
        DB::table('materias')->insert(['mat_descripcion'=>'BACK-END','mat_area'=>'TECNICA']);

        DB::table('materias')->insert(['mat_descripcion'=>'CALCULO','mat_area'=>'CIENCIAS']);
        DB::table('materias')->insert(['mat_descripcion'=>'FÍSICA','mat_area'=>'CIENCIAS']);
        DB::table('materias')->insert(['mat_descripcion'=>'GEOMETRÍA','mat_area'=>'CIENCIAS']);
        DB::table('materias')->insert(['mat_descripcion'=>'ÁLGEBRA','mat_area'=>'CIENCIAS']);
    }
}
