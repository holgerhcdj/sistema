<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      DB::table('users')->insert([
            'name'=>'SuperAdmin',
            'cedula'=>'1714028592',
            'phone'=>'09999999999',
            'email'=>'superadmin@sistema.com',
            'perfil'=>0,
            'password'=>bcrypt('12345678'),
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name'=>'Admin',
            'cedula'=>'1234567890',
            'phone'=>'09999999999',
            'email'=>'admin@sistema.com',
            'perfil'=>1,
            'password'=>bcrypt('12345678'),
            'created_at'=>date('Y-m-d H:i:s')
        ]);        
        DB::table('users')->insert([
            'name'=>'Docente',
            'cedula'=>'1717123456',
            'phone'=>'09999999999',
            'email'=>'docente@sistema.com',
            'perfil'=>2,
            'password'=>bcrypt('12345678'),
            'created_at'=>date('Y-m-d H:i:s')
        ]);        
    }
}
