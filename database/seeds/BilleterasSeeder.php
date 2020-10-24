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
          'inversion_inicial' => '8000',
          'total' => '15000',
          'rentabilidad' => '30000',
        ],
        [
          'inversion_inicial' => '2222',
          'total' => '150000',
          'rentabilidad' => '0',
        ],
        [
          'inversion_inicial' => '70000',
          'total' => '350000',
          'rentabilidad' => '0',
        ],
        [
          'inversion_inicial' => '74000',
          'total' => '300000',
          'rentabilidad' => '0',
        ],
      ]);
    }
}
