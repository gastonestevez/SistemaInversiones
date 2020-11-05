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
          'avatar' => "archivos/img/imagen1.jpg",
          'is_admin' => true,
          'email' => 'dakota@gmail.com',
          'password' => Hash::make('asdfasdf'),
          'created_at' => '2020-01-02 07:57:53',
        ],
        [
          'name' => 'Usuario 1',
          'last_name' => '111',
          'number' => '06-05-543',
          'avatar' => "archivos/img/imagen2.jpg",
          'is_admin' => false,
          'email' => 'usuario1@gmail.com',
          'password' => Hash::make('123456'),
          'created_at' => '2020-01-02 07:57:53',
        ],
        [
          'name' => 'Dakota Dummy User',
          'last_name' => '222',
          'number' => '2342432',
          'avatar' => "archivos/img/imagen3.jpg",
          'is_admin' => true,
          'email' => 'dummy@dakota.com',
          'password' => Hash::make('123456'),
          'created_at' => '2020-01-02 07:57:53',
        ],
        [
          'name' => 'Usuario 3',
          'last_name' => '333',
          'number' => '123146',
          'avatar' => '#',
          'is_admin' => false,
          'email' => 'usuario3@gmail.com',
          'password' => Hash::make('123456'),
          'created_at' => '2020-01-02 07:57:53',
        ],
      ]);
    }
}
