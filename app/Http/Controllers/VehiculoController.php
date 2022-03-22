<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehiculo;


class VehiculoController extends Controller
{
    protected $VehiculoModel;

    public function __construct(Vehiculo $vehiculo)
    {
        $this->VehiculoModel = $vehiculo;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taller.vehiculos.vehiculos')->with('vehiculos', $this->VehiculoModel->getListadoVehiculos());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('taller.vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehiculos = new Vehiculo();

        $vehiculos->SujetoId = "1";
        $vehiculos->Placa = $request->get('placa');
        $vehiculos->Modelo = $request->get('modelo');
        $vehiculos->Marca  = $request->get('marca');
        $vehiculos->Descripcion = $request->get('descripcion');
        $vehiculos->Activo = "1";
        $vehiculos->UserCreated = "0";

        $vehiculos->Anio = $request->get('anio');
        $vehiculos->Tipo = $request->get('tipo');
        $vehiculos->Color = $request->get('color');

        $vehiculos->save();

        return redirect('/vehiculos')->with('guardar', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = $this->VehiculoModel::find($id);
        $vehiculo->Activo =  0;
        $vehiculo->save();

        return redirect('/vehiculos')->with('eliminar', 'ok');

    }
}
