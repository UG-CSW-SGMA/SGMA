<?php

namespace App\Http\Controllers;

use App\Exceptions\Notificacion;
use Illuminate\Http\Request;
use App\Models\Sujeto;


class ProveedorController extends Controller
{
    protected $ProveedorModel;

    public function __construct(Sujeto $proveedor)
    {
        $this->ProveedorModel = $proveedor;
    }

    /**
     * 
     * Muestra la vista de todas las categorias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('compras.proveedores.index')->with('proveedores', $this->ProveedorModel->getListadoProveedores());
    }

    /**
     * Mostrar el formulario para crear una nueva categoria.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compras.proveedores.create');
    }

    /**
     * Almacena la categoría recién creada en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sujeto_new = new Sujeto();

        $sujeto_new->TipoSujeto = 2;
        $sujeto_new->DNI = $request->get('txtDNI');
        $sujeto_new->Nombre = $request->get('txtNombre');
        $sujeto_new->Apellido = $request->get('txtApellido');
        $sujeto_new->Direccion = $request->get('txtDireccion');
        $sujeto_new->Telefono = is_null($request->get('txtTelefono')) ? '' : $request->get('txtTelefono');
        $sujeto_new->Email = $request->get('txtEmail');
        $sujeto_new->Activo = 1;
        $sujeto_new->UserCreated = 0;
        $sujeto_new->save();
        return redirect('/proveedores');
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
        $ObjSujeto = $this->Sujeto::find($id);

        return view('compras.proveedores.edit')->with('ObjSujeto', $ObjSujeto);
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

        // $Descripcion = "";
        // if (!is_null($request->get('txtDescripcion'))) {
        //     $Descripcion = $request->get('txtDescripcion');
        // }
        // $categoria_edit = $this->CategoriaModel::find($id);
        // $categoria_edit->TipoServicioId = $request->get('txtTipoServicio');;
        // $categoria_edit->Nombre = $request->get('txtNombre');
        // $categoria_edit->Descripcion =  $Descripcion;
        // $categoria_edit->Activo =  1;
        // $categoria_edit->UserUpdated = 0;
        // if ($categoria_edit->save() == 1) {
        //     //$Notificar->setNotificacion("Categoría actualizada!", "blue", "Mostrar");
        // }
        // return redirect('/categorias');
    }

    /**
     * Elimina en Base de datos el registro de la tabla categoría.
     * Tener presente que el método sólo cambia de estado ya que no se permite eliminar registros
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor_del = $this->ProveedorModel::find($id);
        $proveedor_del->Activo =  0;
        $proveedor_del->save();

        return redirect('/proveedores');
    }

    /**
     * Muestra el formulario modal para eliminar una categoria.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function del($id)
    {
        $ObjProveedor = $this->ProveedorModel::find($id);
        return view('compras.proveedores.delete')->with('ObjProveedor', $ObjProveedor);
    }
}
