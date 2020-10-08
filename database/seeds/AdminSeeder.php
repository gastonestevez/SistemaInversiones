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
          'nombre' => 'Tato',
          'apellido' => 'Estevez',
          'numero' => '03-03-456',
          'foto' => '#',
          'is_admin' => true,
          'email' => 'dakota@gmail.com',
          'password' => bcrypt('asdfasdf'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'nombre' => 'Usuario 1',
          'apellido' => '111',
          'numero' => '06-05-543',
          'foto' => '#',
          'is_admin' => false,
          'email' => 'usuario1@gmail.com',
          'password' => "123456",
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'nombre' => 'Usuario 2',
          'apellido' => '222',
          'numero' => '2342432',
          'foto' => '#',
          'is_admin' => false,
          'email' => 'usuario2@gmail.com',
          'password' => "123456",
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'nombre' => 'Usuario 3',
          'apellido' => '333',
          'numero' => '123146',
          'foto' => '#',
          'is_admin' => false,
          'email' => 'usuario3@gmail.com',
          'password' => "123456",
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
      ]);
    }
}
