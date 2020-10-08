<?php

use Illuminate\Database\Seeder;

class LocalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('localidades')->insert([
        [
          "nombre" => "Ciudad Madero",
        ],
        [
          "nombre" => "San Nicolas",
        ],
        [
          "nombre" => "Montserrat",
        ],
        [
          "nombre" => "Tapiales",
        ],
        [
          "nombre" => "Canning",
        ],
        [
          "nombre" => "Luis Guillon",
        ],
        [
          "nombre" => "Monte Grande",
        ],
      ]);
    }
}
