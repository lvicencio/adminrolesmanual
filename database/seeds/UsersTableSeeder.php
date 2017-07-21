<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name'=>'Administrador',
          'email'=> 'admin@gmail.com',
          'password'=> bcrypt('123456'),
          'rol'=>'admin',
          'role'=> 0
      ]);
      DB::table('users')->insert([
          'name'=>'Cliente',
          'email'=> 'cliente@gmail.com',
          'password'=> bcrypt('123456'),
          'rol'=>'cliente',
          'role'=> 1
      ]);
      DB::table('users')->insert([
          'name'=>'visita',
          'email'=> 'visita@gmail.com',
          'password'=> bcrypt('123456'),
          'rol'=>'visita',
          'role'=> 2
      ]);
    }
}
