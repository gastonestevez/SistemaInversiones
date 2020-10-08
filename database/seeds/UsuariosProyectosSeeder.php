<?php

use Illuminate\Database\Seeder;

class UsuariosProyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('usuarios_proyectos')->insert([
        [
          'inversion' => '2222',
          'proyecto_id' => '1',
          'user_id' => '2',
        ],
        [
          'inversion' => '35000',
          'proyecto_id' => '2',
          'user_id' => '3',
        ],
        [
          'inversion' => '35000',
          'proyecto_id' => '3',
          'user_id' => '3',
        ],
        [
          'inversion' => '74000',
          'proyecto_id' => '3',
          'user_id' => '4',
        ],
      ]);
    }
}
