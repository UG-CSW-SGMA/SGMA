<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categoria extends Model
{
    use HasFactory;

    /**
     * @Rafael1108
     * Método para obtener un vista del listado de las categorías activas, incluye los tipos de servicio. 
     */
    public function getListadoActivoConTipoServicio()
    {
        return DB::table('categorias')
            ->join('tipo_servicios', 'categorias.TipoServicioId', '=', 'tipo_servicios.Id')
            ->select('categorias.*', 'tipo_servicios.Nombre as TipoServicioNombre')
            ->where('categorias.Activo', '=', 1)
            ->get();
    }
}
