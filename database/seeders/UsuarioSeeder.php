<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsuarioSeeder extends Seeder
{
    /*
    * Tipos de Servicios que se cargan por default en la base de datos
    */
    static $Usuarios = [
        [1, 1, 'admin', 'admin@hotmail.com', 'Administrador del Sistema', 'admin', 'admin', 1, 1, 1],
        [2, 2, 'gerente', 'gerente@hotmail.com', 'Gerente', '123', '123', 1, 1, 1],
        [3, 3, 'vendedor', 'vendedor@hotmail.com', 'Vendedor', '123', '123', 1, 1, 1],
        [4, 4, 'mecanico', 'mecanico@hotmail.com', 'Mecanico del Sistema', '123', '123', 1, 1, 1]
    ];

    /**
     * Corre insert en la tabla
     *
     * @return void
     */
    public function run()
    {

        $date = Carbon::now();
        foreach (self::$Usuarios as $Usuario) {

            DB::table('usuarios')->insert([
                'Id' => $Usuario[0],
                'TipoRol' =>  $Usuario[1],
                'NickName' =>  $Usuario[2],
                'Email' =>  $Usuario[3],
                'NombreCompleto' =>  $Usuario[4],
                'PasswordSALT' => password_hash($Usuario[5], PASSWORD_DEFAULT, array('cost' => 9)),
                'PasswordHASH' => password_hash($Usuario[6], PASSWORD_DEFAULT, array('cost' => 9)),
                'Activo' => $Usuario[7],
                'UsuarioCreacion' => $Usuario[8],
                'UserCreated' => $Usuario[9],
                'created_at' => $date,
            ]);
        }
    }
}
