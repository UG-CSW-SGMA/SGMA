<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Realiza el llamado de las siembras o inserciones en la base de datos.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(EmpresaTableSeeder::class);
        $this->call(TipoServiciosTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(UsuarioSeeder::class);
    }
}
