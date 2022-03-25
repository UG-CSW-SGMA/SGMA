<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrdenAtencion extends Model
{
    use HasFactory;

    public function getListadoOrdenes()
    {
        return DB::table('ordenes_atencion')
            ->join('usuarios', 'ordenes_atencion.MecanicoId', '=', 'usuarios.id')
            ->select('ordenes_atencion.*', 'usuarios.NombreCompleto as Mecanico')
            ->get();
    }

    /**
     * @edgarbasurto
     * Método que devuelve el id del último registro insertado en la tabla
     */
    public function getLastOrdenID()
	{
		return DB::getPdo()->lastInsertId();
	}

}
