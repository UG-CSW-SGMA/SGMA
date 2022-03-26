<?php

namespace App\Http\Controllers;

use App\Models\OrdenAtencion;
use App\Models\TipoServicio;
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
        return view('taller.ordenAtencion.index')
        ->with('ordenes',$this->OrdenAtencionModel->getListadoOrdenes());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $numOrden = $this->OrdenAtencionModel->generarNumeroOrden();
        $mecanicos = new Usuario();
        $tipoServicios = new TipoServicio();
        return view('taller.ordenAtencion.create')
        ->with('mecanicos',$mecanicos->getListadoPorRol(3))
        ->with('numOrden',$numOrden)
        ->with('tipoServicios', $tipoServicios->getListadoActivos());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oda = new OrdenAtencion();
        $oda->NumeroTransaccion = $request->get('numeroOrden');
        $oda->TipoServicioId = $request->get('tipoServicioId');
        $oda->MecanicoId = $request->get('mecanicoId');
        $oda->VendedorId = '1'; // se debe obtener de la session al ingresar con usuario VENDEDOR
        $oda->SujetoId = $request->get('clienteId');
        $oda->DNI = $request->get('dni');
        $oda->Cliente = $request->get('cliente');
        $oda->FechaHora = $request->get('fechaIngreso');
        $oda->VehiculoId = $request->get('vehiculoId');
        $oda->Placa = $request->get('placa');
        $oda->Vehiculo = $request->get('vehiculo');
        $oda->DescripcionRecepcionVehiculo = $request->get('observaciones');
        $oda->EstadoODA = $request->get('estadoODA');
        $oda->KilometroActualVehiculo = $request->get('kilometraje');
        $oda->UserCreated = '0';
                
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
