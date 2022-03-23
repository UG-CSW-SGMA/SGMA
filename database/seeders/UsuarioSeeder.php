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

        $usuario2 = new Usuario();
        $usuario2->TipoRol = 4;
        $usuario2->NickName = "vendedor";
        $usuario2->Email = "vendedor@hotmail.com";
        $usuario2->NombreCompleto = "vendedor";
        $usuario2->PasswordSALT = password_hash("vendedor",PASSWORD_DEFAULT,array('cost' => 9));
        $usuario2->PasswordHASH = password_hash("vendedor",PASSWORD_DEFAULT,array('cost' => 9));;
        $usuario2->Activo = 1;
        $usuario2->UsuarioCreacion = 1;
        $usuario2->UserCreated = 1;

        $usuario2->save();
    }
}
