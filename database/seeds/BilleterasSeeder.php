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
          'total' => '0',
          'invertido' => '0',
          'rentabilidad' => '0',
        ],
        [
          'total' => '0',
          'invertido' => '0',
          'rentabilidad' => '0',
        ],
      ]);
    }
}
