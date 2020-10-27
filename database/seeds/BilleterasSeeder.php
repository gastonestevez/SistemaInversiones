<?php

use Illuminate\Database\Seeder;

class BilleterasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('billeteras')->insert([
        [
          'inversion_inicial' => '15000',
          'total' => '8000',
          'rentabilidad' => '30000',
        ],
        [
          'inversion_inicial' => '2222',
          'total' => '150000',
          'rentabilidad' => '0',
        ],
        [
          'inversion_inicial' => '350000',
          'total' => '70000',
          'rentabilidad' => '0',
        ],
        [
          'inversion_inicial' => '300000',
          'total' => '74000',
          'rentabilidad' => '0',
        ],
      ]);
    }
}
