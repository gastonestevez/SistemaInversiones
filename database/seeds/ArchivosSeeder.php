<?php

use Illuminate\Database\Seeder;

class ArchivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('archivos')->insert([
        [
          "logo" => "archivos/logos/logo1.png",
          "imagen" => "archivos/img/imagen1.jpg",
          "documento" => "archivos/pdf/plano.pdf",
          "proyecto_id" => 1,
        ],
        [
          "logo" => "archivos/logos/logo2.png",
          "imagen" => "archivos/img/imagen2.jpg",
          "documento" => "",
          "proyecto_id" => 1,
        ],
        [
          "logo" => null,
          "imagen" => "archivos/img/imagen3.jpg",
          "documento" => "",
          "proyecto_id" => 1,
        ],
        [
          "logo" => "archivos/logos/logo1.png",
          "imagen" => "archivos/img/imagen1.jpg",
          "documento" => "archivos/pdf/plano.pdf",
          "proyecto_id" => 2,
        ],
        [
          "logo" => null,
          "imagen" => "archivos/img/imagen2.jpg",
          "documento" => "archivos/pdf/plano.pdf",
          "proyecto_id" => 2,
        ],
        [
          "logo" => null,
          "imagen" => "archivos/img/imagen3.jpg",
          "documento" => "archivos/pdf/plano.pdf",
          "proyecto_id" => 2,
        ],
        [
          "logo" => null,
          "imagen" => "archivos/img/imagen1.jpg",
          "documento" => "archivos/pdf/plano.pdf",
          "proyecto_id" => 3,
        ],
        [
          "logo" => null,
          "imagen" => "archivos/img/imagen1.jpg",
          "documento" => "archivos/pdf/plano.pdf",
          "proyecto_id" => 3,
        ]
     ]);
    }
}
