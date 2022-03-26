<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DocumentoCompraDetalle extends Model
{
    use HasFactory;

    /**
     * @Rafael1108
     * Método para obtener el listado de las compras activas. 
     */
    public function getListadoActivos()
    {
        return DB::table('compras')
            ->where('compras.Activo', '=', 1)
            ->get();
    }

}
