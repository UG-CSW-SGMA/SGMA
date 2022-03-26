<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class ReportesController extends Controller
{
    /**
     * @Rafael1108
     * Muestra la vista de reportes
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reportes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        switch ($id) {

            case 2:
                /* retorna la vista en funcion del id del reporte que se requiere*/
                return view('reportes.nuevosClientes');
                break;

            default:
                return response()->json(['error' => 'Reporte no encontrado!'], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $EmpresaModel = new Empresa();
        $emp  = $EmpresaModel::all(['id', 'RUC', 'RazonSocial', 'NombreComercial']);
        $lblrango = "<strong>Desde:</strong> 11/11/2000 <strong>Hasta:</strong> 11/11/2000";

        switch ($id) {

            case 2:
                /* retorna la vista en funcion del id del reporte que se requiere*/
                return view('reportes.rptForm.rptNuevosClientes')->with('emp', $emp[0])->with('lblrango', $lblrango);
                break;

            default:
                return response()->json(['error' => 'Reporte no encontrado!'], 500);
        }
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
