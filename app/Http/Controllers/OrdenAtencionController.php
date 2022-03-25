<?php

namespace App\Http\Controllers;

use App\Models\OrdenAtencion;
use App\Models\Usuario;
use Illuminate\Http\Request;

class OrdenAtencionController extends Controller
{
    protected $OrdenAtencionModel;

    public function __construct(OrdenAtencion $ordenAtencion)
    {
        $this->OrdenAtencionModel = $ordenAtencion;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taller.ordenAtencion.index')->with('ordenes',$this->OrdenAtencionModel->getListadoOrdenes());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $numOrden = $this->OrdenAtencionModel->getLastOrdenID()+1;
        $mecanicos = new Usuario();
        return view('taller.ordenAtencion.create')->with('mecanicos',$mecanicos->getListadoPorRol(3))->with('numOrden',$numOrden);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dni = $request->get('dni');
        $oda = new OrdenAtencion();
        $oda->NumeroTransaccion = $request->get('numeroODA');
        $oda->
        $oda->TipoSujeto = "1";
        $oda->DNI = $dni;
        $oda->Nombre = $request->get('nombre');
        $oda->Apellido  = $request->get('apellido');
        $oda->Direccion = $request->get('direccion');
        $oda->Telefono = $request->get('telefono');
        $oda->Email = $request->get('email');
        $oda->Activo = "1";
        $oda->UserCreated = "0";
        $oda->save();

        return redirect('/ordenAtencion')->with('guardar', 'ok');
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
        //
    }
}
