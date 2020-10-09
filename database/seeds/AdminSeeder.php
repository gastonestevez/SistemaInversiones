<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
          'name' => 'Tato',
          'last_name' => 'Estevez',
          'number' => '03-03-456',
          'avatar' => '#',
          'is_admin' => true,
          'email' => 'dakota@gmail.com',
          'password' => Hash::make('asdfasdf'),
        ],
        [
          'name' => 'Usuario 1',
          'last_name' => '111',
          'number' => '06-05-543',
          'avatar' => '#',
          'is_admin' => false,
          'email' => 'usuario1@gmail.com',
          'password' => Hash::make('123456'),
        ],
        [
          'name' => 'Usuario 2',
          'last_name' => '222',
          'number' => '2342432',
          'avatar' => '#',
          'is_admin' => false,
          'email' => 'usuario2@gmail.com',
          'password' => Hash::make('123456'),
        ],
        [
          'name' => 'Usuario 3',
          'last_name' => '333',
          'number' => '123146',
          'avatar' => '#',
          'is_admin' => false,
          'email' => 'usuario3@gmail.com',
          'password' => Hash::make('123456'),
        ],
      ]);
    }
}