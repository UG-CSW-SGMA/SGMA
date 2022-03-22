<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    protected $EmpresaModel;

    public function __construct(Empresa $Empresa)
    {
        $this->EmpresaModel = $Empresa;
    }

    /**
     * 
     * Muestra la vista de todas las Empresas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp  = $this->EmpresaModel::all(['id', 'RUC', 'RazonSocial', 'NombreComercial']);

        return view('parametros.empresa.index')->with('emp', $emp[0]);
    }

    /**
     * Mostrar el formulario para crear una nueva Empresa.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Almacena la categoría recién creada en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Muestra el formulario para editar una Empresa.
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

        $Descripcion = "";
        if (!is_null($request->get('txtDescripcion'))) {
            $Descripcion = $request->get('txtDescripcion');
        }
        $Empresa_edit = $this->EmpresaModel::find($id);
        $Empresa_edit->TipoServicioId = $request->get('txtTipoServicio');;
        $Empresa_edit->Nombre = $request->get('txtNombre');
        $Empresa_edit->Descripcion =  $Descripcion;
        $Empresa_edit->Activo =  1;
        $Empresa_edit->UserUpdated = 0;
        if ($Empresa_edit->save() == 1) {
            //$Notificar->setNotificacion("Categoría actualizada!", "blue", "Mostrar");
        }
        return redirect('/Empresas');
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
