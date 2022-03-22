<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Else_;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class Sujeto extends Model
{
    use HasFactory;

    /**
     * @edgarbasurto
     * Método para obtener una vista del listado de clientes activos
     */

    public function getListadoClientes()
    {
        return DB::table('sujetos')
            ->select('*')
            ->where([
                ['Activo', '=', '1'],
                ['TipoSujeto', '=', '1'],
            ])
            ->get();
    }


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

    public function getCliente($dni){
        $encontrado = DB::table('sujetos')
        ->select('*')
        ->where('DNI', '=', $dni)
        ->get();
       
        if (!($encontrado->isEmpty())) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
