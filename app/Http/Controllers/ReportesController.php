<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    private $EmpresaModel;
    public function __construct()
    {
        $EmpresaModel = new Empresa();
    }
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



    /**
     * Método POST para obtener los reportes renderizados y exportables.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showReport(Request $request, $id)
    {
        switch ($id) {

            case 2:
                /* retorna la vista en funcion del id del reporte que se requiere*/
                return $this->rptNuevosClientes($request);
            default:
                return response()->json(['error' => 'Reporte no encontrado!'], 500);
        }
    }

    private function rptNuevosClientes(Request $request)
    {
        $emp  = $this->EmpresaModel::all(['id', 'RUC', 'RazonSocial', 'NombreComercial']);
        $data = null;
        $lblrango = null;
        if (!is_null($request->get('checkRangos'))) {
            $dtDesde = $request->get('dtDesde');
            $dtHasta = $request->get('dtHasta');

            $lblrango = "<strong>Desde:</strong> " . $dtDesde ." <strong>Hasta:</strong> ". $dtHasta;
            $data = DB::table('sujetos')
                ->join('tipo_servicios', 'categorias.TipoServicioId', '=', 'tipo_servicios.Id')
                ->select('categorias.*', 'tipo_servicios.Nombre as TipoServicioNombre')
                ->where('categorias.Activo', '=', 1)
                ->get();
        } else {
            $dtMesAnio = $request->get('dtMesAnio');

            $lblrango = "<strong>Mes:</strong> " . $dtMesAnio . " <strong>Año:</strong> " . $dtMesAnio;
        }



        return view('reportes.rptForm.rptNuevosClientes')->with('emp', $emp[0])->with('lblrango', $lblrango)->with('data', $data);
        // $view =  view('reportes.rptForm.rptNuevosClientes')->with('emp', $emp[0])->with('lblrango', $lblrango)->render();
        // $pdf = PDF::loadHTML($view);
        // return $pdf->download();


    }
}
