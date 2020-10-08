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
      // $this->call(UsersTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(AsesoresSeeder::class);
        $this->call(LocalidadesSeeder::class);
        $this->call(TipoDeReferentesSeeder::class);
        $this->call(BilleterasSeeder::class);
        $this->call(ProyectosSeeder::class);
        $this->call(ActualizacionesSeeder::class);
        $this->call(ArchivosSeeder::class);
        $this->call(ReferentesSeeder::class);
        $this->call(UsuariosProyectosSeeder::class);
    }
}
