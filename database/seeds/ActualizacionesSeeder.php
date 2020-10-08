<?php

use Illuminate\Database\Seeder;

class ActualizacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('actualizaciones')->insert([
        [
          "nombre_empresa" => "Disco",
          "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoit. ",
          "proyecto_id" => "1",
        ],
        [
          "nombre_empresa" => "Ekono",
          "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoit. ",
          "proyecto_id" => "2",
        ],
        [
          "nombre_empresa" => "Easy",
          "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoit. ",
          "proyecto_id" => "2",
        ],
        [
          "nombre_empresa" => "Fargo",
          "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoit. ",
          "proyecto_id" => "3",
        ],
      ]);
    }
}
