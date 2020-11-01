<?php

use Illuminate\Database\Seeder;

class ReferentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('referentes')->insert([
        [
          "nombre" => "Pablo Caseros",
          "foto" => "archivos/img/imagen2.jpg",
          "proyecto_id" => 1,
          "tipo_de_referente_id" => 1,
        ],
        [
          "nombre" => "Andres Carton",
          "foto" => "archivos/img/imagen3.jpg",
          "proyecto_id" => 2,
          "tipo_de_referente_id" => 1,
        ],
        [
          "nombre" => "Julio Iglesias",
          "foto" => "archivos/img/imagen1.jpg",
          "proyecto_id" => 3,
          "tipo_de_referente_id" => 2,
        ],
        [
          "nombre" => "Arturo Illia",
          "foto" => "archivos/img/imagen1.jpg",
          "proyecto_id" => 1,
          "tipo_de_referente_id" => 2,
        ],
        [
          "nombre" => "Oscar Rugeri",
          "foto" => "archivos/img/imagen1.jpg",
          "proyecto_id" => 2,
          "tipo_de_referente_id" => 3,
        ],
        [
          "nombre" => "Bruno Diaz",
          "foto" => "archivos/img/imagen1.jpg",
          "proyecto_id" => 3,
          "tipo_de_referente_id" => 3,
        ],
      ]);
    }
}
