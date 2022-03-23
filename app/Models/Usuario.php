<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    use HasFactory;

    /**
     * @Rafael1108
     * Método para obtener el listado de los tipos de servicios. 
     */
    public function getListadoActivos()
    {
        return DB::table('usuarios')
            ->select('id','usuarios.TipoRol', 'usuarios.NickName', 'usuarios.NombreCompleto')
            ->where('usuarios.Activo', '=', 1)
            ->get();
    }
}
