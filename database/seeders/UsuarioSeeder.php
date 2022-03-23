<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usuario = new Usuario();
        
        $usuario->TipoRol = 1;
        $usuario->NickName = "admin";
        $usuario->Email = "admin@hotmail.com";
        $usuario->NombreCompleto = "admin";
        $usuario->PasswordSALT = password_hash("admin",PASSWORD_DEFAULT,array('cost' => 9));
        $usuario->PasswordHASH = password_hash("admin",PASSWORD_DEFAULT,array('cost' => 9));;
        $usuario->Activo = 1;
        $usuario->UsuarioCreacion = 1;
        $usuario->UserCreated = 1;
        $usuario->save();


    }
}
