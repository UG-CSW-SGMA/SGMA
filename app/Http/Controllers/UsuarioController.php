<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class UsuarioController extends Controller
{
    protected $UsuarioModel;
    public function __construct(Usuario $Usuario)
    {
        $this->UsuarioModel = $Usuario;
    }

    /**
     * 
     * Muestra la vista de todas las categorias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parametros.usuario.index')->with('usuarios', $this->UsuarioModel->getListadoActivos());
    }

    /**
     * Mostrar el formulario para crear una nueva categoria.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametros.usuario.create');  
    }

    /**
     * Almacena la categoría recién creada en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'TipoRol'=>'required',
            'NickName'=>'required',
            'Email'=>'required',
            'NombreCompleto'=>'required',
            'PasswordSALT'=>'required',
            'PasswordHASH'=>'required',
            'Activo'=>'required',
        ]);

    
        
        $data=new Usuario;
        $data->TipoRol=$request->TipoRol;
        $data->NickName=$request->NickName;
        $data->Email=$request->Email;
        $data->NombreCompleto=$request->NombreCompleto;
        $data->PasswordSALT=$request->PasswordSALT;
        $data->PasswordHASH=$request->PasswordHASH;
        $data->Activo=$request->Activo;
        
        $data->save();

        $ref=$request->ref;
        if($ref=='front'){
            return redirect('register')->with('success','Data has been saved.');
        }

        return redirect('/usuarios')->with('success','Data has been added.');
    }

    /**
     * Devuelve una categoría.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Usuario::find($id);
        return view('parametros.usuario.show',['data'=>$data]);
    }

    /**
     * Muestra el formulario para editar una categoria.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Usuario::find($id);
        return view('parametros.usuario.edit',['data'=>$data]);
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
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
        ]);

        if($request->hasFile('photo')){
            $imgPath=$request->file('photo')->store('public/imgs');
        }else{
            $imgPath=$request->prev_photo;
        }
        
        $data=Usuario::find($id);
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->photo=$imgPath;
        $data->save();

        return redirect('usuarios/'.$id.'/edit')->with('success','Data has been updated.');
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
