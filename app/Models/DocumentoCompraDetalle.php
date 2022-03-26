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
     * Método para obtener el listado de las documento_compra_detalles activas. 
     */
    public function getListadoActivos()
    {
        return DB::table('documento_compra_detalles')
            ->where('documento_compra_detalles.Activo', '=', 1)
            ->get();
    }

}
