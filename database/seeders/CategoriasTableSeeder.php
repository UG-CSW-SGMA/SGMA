<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriasTableSeeder extends Seeder
{
    /*
    * Categorias por default en la base de datos
    */
    static $categorias = [
        [1, 'Repuestos', '..'],
        [2, 'Accesorios de interior', '..'],
        [1, 'Servicios Mecanicos', '..'],
        [2, 'Accesorios de exterior', '..']
    ];

    /**
     * Corre insert en la tabla
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        foreach (self::$categorias as $categoria) {

            DB::table('categorias')->insert([
                'TipoServicioId' => $categoria[0],
                'Nombre' => $categoria[1],
                'Descripcion' =>  $categoria[2],
                'UserCreated' => 0,
                'created_at' => $date,
            ]);
        }
    }
}
