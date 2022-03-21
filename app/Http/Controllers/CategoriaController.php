<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\TipoServicio;

use Carbon\Carbon;
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
        $tiposServicios = $TipoServicio->getListadoActivos();
        print_r($tiposServicios);
        return view('inventario.categorias.create')->with('tiposServicios',);
    }

    /**
     * Almacena la categoría recién creada en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();
        if ($request->get('txtTipoServicio') > 0) {

            $Descripcion = "";
            if (!is_null($request->get('txtDescripcion'))) {
                $Descripcion = $request->get('txtDescripcion');
            }

            $cat_new = new Categoria();

            $cat_new->TipoServicioId = $request->get('txtTipoServicio');;
            $cat_new->Nombre = $request->get('txtNombre');
            $cat_new->Descripcion =  $Descripcion;
            $cat_new->Activo = "1";
            $cat_new->UserAdd = 0;
            $cat_new->save();

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
        $ObjCategoria = $this->CategoriaModel::find($id);

        $TipoServicio = new TipoServicio();

        return view('inventario.categorias.edit')->with('ObjCategoria', $ObjCategoria)->with('tiposServicios', $TipoServicio->getListadoActivos());
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
        $date = Carbon::now();
        $Descripcion = "";
        if (!is_null($request->get('txtDescripcion'))) {
            $Descripcion = $request->get('txtDescripcion');
        }
        $categoria_edit = $this->CategoriaModel::find($id);
        $categoria_edit->TipoServicioId = $request->get('txtTipoServicio');;
        $categoria_edit->Nombre = $request->get('txtNombre');
        $categoria_edit->Descripcion =  $Descripcion;
        $categoria_edit->Activo =  1;
        $categoria_edit->UserUpdate = 0;
        $categoria_edit->save();

        return redirect('/categorias');
    }

    /**
     * Elimina en Base de datos el registro de la tabla categoría.
     * Tener presente que el método sólo cambia de estado ya que no se permite eliminar registros
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
