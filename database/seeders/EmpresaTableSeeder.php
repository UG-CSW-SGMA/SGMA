<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmpresaTableSeeder extends Seeder
{
    /*
    * Categorias por default en la base de datos
    */
    static $empresas = [
        [1, '9999999999001', 'TALLER "ABC" ', 'Empresa NN', 'Ecuador'],
    ];

    /**
     * Corre insert en la tabla
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        foreach (self::$empresas as $empresa) {

            DB::table('empresas')->insert([
                'id' => $empresa[0],
                'RUC' => $empresa[1],
                'RazonSocial' =>  $empresa[2],
                'NombreComercial' =>  $empresa[3],
                'Direccion' =>  $empresa[4],
                'UserCreated' => 0,
                'created_at' => $date
            ]);
        }
    }
}
