<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Tato',
            'email' => 'dakota@gmail.com',
            'password' => bcrypt('asdfasdf'),
        ]);
    }
}
