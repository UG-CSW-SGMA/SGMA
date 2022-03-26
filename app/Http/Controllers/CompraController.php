<?php

namespace App\Http\Controllers;
use App\Models\DocumentoCompra;
use App\Models\DocumentoDetalleCompra;
use Illuminate\Http\Request;
use DB;

class CompraController extends Controller
{
    // protected $DocumentoCompraModel;
    // public function __construct(DocumentoCompra $documentocompra)
    // {
    //     $this->DocumentoCompraModel = $documentocompra;
    // }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request)
    	{
    		$query = trim($request->input('buscarTexto'));

    		//DB::raw() permite escribir sentencias SQL en crudo
    		$ingresos = DB::table('ingreso as i')
    		->join('persona as p', 'p.id', '=', 'i.id_proveedor')
    		->join('detalle_ingreso as di', 'di.id_ingreso', '=', 'i.id')
    		->select('p.nombre', 'i.id', 'i.tipo_comprobante', 
    			'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado', DB::raw('sum(di.cantidad * di.precio_comrpa) as total'))
    		->where('i.num_comprobante', 'LIKE', "%$query%")
    		->orderBy('i.id', 'DESC')
    		->groupBy('p.nombre', 'i.id', 'i.tipo_comprobante', 
    			'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado')
    		->paginate(5);

    		return view('compras.compra.index', [
    					'ingresos' => $ingresos, 
    					'buscarTexto' => $query]);
    	}
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
