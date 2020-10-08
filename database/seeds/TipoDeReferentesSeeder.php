<?php

use Illuminate\Database\Seeder;

class TipoDeReferentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tipo_de_referentes')->insert([
        [
          "tipo" => "Arquitectos",
        ],
        [
          "tipo" => "Participantes",
        ],
        [
          "tipo" => "Inversores",
        ],
      ]);
    }
}
