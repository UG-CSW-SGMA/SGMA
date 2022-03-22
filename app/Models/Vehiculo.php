<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vehiculo extends Model
{
    use HasFactory;

    public function getListadoVehiculos()
    {
        return DB::table('vehiculos')
            ->select('*')
            ->where('Activo', '=', 1)
            ->get();
    }
}
