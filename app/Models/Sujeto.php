<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sujeto extends Model
{
    use HasFactory;

    /**
     * @Rafael1108
     * Método para obtener un vista del listado de proveedores activos. 
     */
    public function getListadoProveedores()
    {
        return DB::table('sujetos')
            ->select('*')
            ->where([
                ['Activo', '=', '1'],
                ['TipoSujeto', '=', '2'],
            ])
            ->get();
    }
}
