<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrdenesAtencion extends Model
{
    use HasFactory;

    protected $table = "ordenes_atencion";
    /**
     * @edgarbasurto
     * Método que devuelve el listado de las ordenes de atención
     */
    public function getListadoOrdenes()
    {
        return DB::table('ordenes_atencion')
            ->join('usuarios', 'ordenes_atencion.MecanicoId', '=', 'usuarios.id')
            ->join('tipo_servicios', 'ordenes_atencion.TipoServicioId', '=', 'tipo_servicios.id')
            ->select('ordenes_atencion.*', 'usuarios.NombreCompleto as Mecanico', 'tipo_servicios.Nombre as TipoServicio')
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

    /**
     * @edgarbasurto
     * Método que devuelve el código de la orden de atención según
     * formato indicado en la documentación '2022ODA-001'
     */
    public function generarNumeroOrden()
    {
        $num = $this->getLastOrdenID() + 1;
        return date("Y") . 'ODA-00' . $num;
    }
}
