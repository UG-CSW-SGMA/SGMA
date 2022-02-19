<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoServiciosTableSeeder extends Seeder
{
    /*
    * Tipos de Servicios que se cargan por default en la base de datos
    */
    static $TiposServicios = [
        ['Mecanica', 'prb'],
        ['Electronica', 'dsfsd']
    ];


    /**
     * Corre insert en la tabla
     *
     * @return void
     */
    public function run()
    {

        $date = Carbon::now();
        foreach (self::$TiposServicios as $tiposervicio) {

            DB::table('tipo_servicios')->insert([
                'Nombre' => $tiposervicio[0],
                'Descripcion' =>  $tiposervicio[1],
                'UsuarioCreacion' => 0,
                'FechaCreacion' => $date,
            ]);
        }
    }
}
