<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sujeto;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = DB::table('sujetos')
            ->select('sujetos.*')
            ->where('sujetos.Activo', '=', 1, 'and', 'sujetos.TipoSujeto', '=', 1)
            ->get();

        return view('taller.clientes.clientes')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taller.clientes.create');
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

        $encontrado = DB::table('sujetos')
            ->select('sujetos.*')
            ->where('sujetos.DNI', '=', $dni)
            // ->where('sujetos.Activo', '=', 1, 'and', 'sujetos.TipoSujeto', '=', 1, 'and', 'sujetos.DNI', '=', $dni)
            ->get();

        if (!isset($encontrado)) {
            $clientes = new Sujeto();

            $clientes->TipoSujeto = "1";
            $clientes->DNI = $dni;
            $clientes->Nombre = $request->get('nombre');
            $clientes->Apellido  = $request->get('apellido');
            $clientes->Direccion = $request->get('direccion');
            $clientes->Telefono = $request->get('telefono');
            $clientes->Email = $request->get('email');
            $clientes->Activo = "1";
            $clientes->UserCreated = "0";
            $clientes->UserCreated = "0";
            $clientes->save();
            // try {
            //     $clientes->save();
            // } catch (QueryException $e) {
            //     return $e->getMessage();
            // }

            return redirect('/clientes');
        } else {
            return 'error';
        }
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
