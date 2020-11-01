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
          'total' => '15000',
          'invertido' => '8000',
          'rentabilidad' => '30000',
        ],
        [
          'total' => '300000',
          'invertido' => '150000',
          'rentabilidad' => '0',
        ],
        [
          'total' => '350000',
          'invertido' => '70000',
          'rentabilidad' => '0',
        ],
        [
          'total' => '300000',
          'invertido' => '74000',
          'rentabilidad' => '0',
        ],
      ]);
    }
}
