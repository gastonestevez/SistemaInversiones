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
      DB::table('proyecto_usuario')->insert([
        [
          'invertido' => '2222',
          'proyecto_id' => '1',
          'user_id' => '2',
          'created_at' => '2020-01-02 07:57:53',
        ],
        [
          'invertido' => '35000',
          'proyecto_id' => '2',
          'user_id' => '3',
          'created_at' => '2020-01-02 07:57:53',
        ],
        [
          'invertido' => '35000',
          'proyecto_id' => '3',
          'user_id' => '3',
          'created_at' => '2020-01-02 07:57:53',
        ],
        [
          'invertido' => '74000',
          'proyecto_id' => '3',
          'user_id' => '4',
          'created_at' => '2020-01-02 07:57:53',
        ],
      ]);
    }
}
