<?php

use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert(['cur_siglas'=>'8VO','cur_descripcion'=>'OCTAVO EGB','cur_numero'=>8]);        
        DB::table('cursos')->insert(['cur_siglas'=>'9NO','cur_descripcion'=>'NOVENO EGB','cur_numero'=>9]);        
        DB::table('cursos')->insert(['cur_siglas'=>'10MO','cur_descripcion'=>'DÉCIMO EGB','cur_numero'=>10]);        
        DB::table('cursos')->insert(['cur_siglas'=>'1ERO','cur_descripcion'=>'PRIMERO BGU','cur_numero'=>1]);        
        DB::table('cursos')->insert(['cur_siglas'=>'2DO','cur_descripcion'=>'SEGUNDO BGU','cur_numero'=>2]);        
        DB::table('cursos')->insert(['cur_siglas'=>'3ERO','cur_descripcion'=>'TERCERO BGU','cur_numero'=>3]);        
    }
}
