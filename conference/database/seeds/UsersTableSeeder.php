<?php

use Illuminate\Database\Seeder;
use conference\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
           'name' => 'Administrador',
           'email' => 'administrador@administrador.com',
           'password' => bcrypt('secret'),
       ]);

    }
}
