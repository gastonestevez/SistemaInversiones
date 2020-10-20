<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AsesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('asesores')->insert([
        [
          'nombre' => 'Jorgito',
          'numero' => '11173627',
          'rentabilidad' => '78',
          'foto' => 'archivos/img/imagen3.jpg',
          'n_de_proyectos' => 5,
          'n_de_inversores' => 37,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'nombre' => 'Juanito',
          'numero' => '13432798',
          'rentabilidad' => '46',
          'foto' => 'archivos/img/imagen4.jpg',
          'n_de_proyectos' => 3,
          'n_de_inversores' => 7,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
          'nombre' => 'Pedrito',
          'numero' => '1431764343',
          'rentabilidad' => '85',
          'foto' => 'archivos/img/imagen1.jpg',
          'n_de_proyectos' => 15,
          'n_de_inversores' => 220,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]
      ]);
    }
}
