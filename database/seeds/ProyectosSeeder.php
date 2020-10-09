<?php

use Illuminate\Database\Seeder;

class ProyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('proyectos')->insert([
        [
          'titulo' => 'Torres del Pozo',
          'slug' => 'Torres-del-Pozo',
          'fecha' => 'Octubre 2025',
          'link_web' => 'www.google.com',
          'imagen_360' => 'www.imagen.com',
          'estados' => 'inicio, obra, inversion, finalizacion',
          'porcentaje' => 20,
          'localidad_id' => 1,
        ],
        [
          'titulo' => 'Edificio Ruby',
          'slug' => 'Edificio-Ruby',
          'fecha' => 'Marzo 2024',
          'link_web' => 'www.google.com',
          'imagen_360' => 'www.imagen.com',
          'estados' => 'inicio, obra, inversion, preparacion, terminado',
          'porcentaje' => 50,
          'localidad_id' => 2,
        ],
        [
          'titulo' => 'Complejo Zencity',
          'slug' => 'Complejo-Zencity',
          'fecha' => 'Enero 2021',
          'link_web' => 'www.google.com',
          'imagen_360' => 'www.imagen.com',
          'estados' => 'inicio, obra, inversion',
          'porcentaje' => 80,
          'localidad_id' => 2,
        ],
      ]);
    }
}
