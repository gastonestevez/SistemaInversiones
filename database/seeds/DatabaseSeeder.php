<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'Tato',
            'apellido' => 'Estevez',
            'numero' => '03-03-456',
            'foto' => '#',
            'is_admin' => true,
            'email' => 'dakota@gmail.com',
            'password' => bcrypt('asdfasdf'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
