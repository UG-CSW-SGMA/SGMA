<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\TipoServicio;

use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    protected $CategoriaModel;
    public function __construct(Categoria $categoria)
    {
        $this->CategoriaModel = $categoria;
    }

    /**
     * 
     * Muestra la vista de todas las categorias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventario.categorias.index')->with('articulos', $this->CategoriaModel->getListadoActivoConTipoServicio());
    }

    /**
     * Mostrar el formulario para crear una nueva categoria.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $TipoServicio = new TipoServicio();
        return view('inventario.categorias.create')->with('tiposServicios', $TipoServicio->getListadoActivos());;
    }

    /**
     * Almacena la categoría recién creada en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('tpServicio') > 0) {

            $Descripcion = "";
            if (!is_null($request->get('descripcion'))) {
                $Descripcion = $request->get('descripcion');
            }

            $categora = new Categoria();

            $categora->TipoServicioId = $request->get('tpServicio');;
            $categora->Nombre = $request->get('nombre');
            $categora->Descripcion =  $Descripcion;
            $categora->Activo = "1";
            $categora->UsuarioCreacion = "0";
            $categora->UsuarioActualizacion = "0";

            $categora->save();

            return redirect('/categorias');
        } else {
            return "Error";
        }
    }

    /**
     * Devuelve una categoría.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Muestra el formulario para editar una categoria.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Actualiza en Base datos el registro de la tabla categoría.
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
     * Elimina en Base de datos el registro de la tabla categoría.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Tener presente que el método sólo cambia de estado ya que no se permite eliminar registros
    }
}
