<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

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
        // $datosUsuario =request()->all();
        // $usuarios = new Usuario();
        // $usuarios->UsuarioCreacion = "0";
        // $usuarios->UsuarioActualizacion = "0";
        
        // $datosUsuario = request()->except('_token');
  
       
        // Usuario::insert($datosUsuario);
     
        // return response ()->json($datosUsuario);
    
        
        $request->validate([
            'TipoRol'=>'required',
            'NickName'=>'required',
            'Email'=>'required',
            'NombreCompleto'=>'required',
            'PasswordSALT'=>'required',
            'PasswordHASH'=>'required',
            'Activo'=>'required',
        ]);

        // // $data->UsuarioCreacion = "2022 -03 -19 03: 11: 33";
        // // $data->UsuarioActualizacion = "2022 -03 -19 03: 11: 33";
        $data=new Usuario;
        $data->id=$request->id;
        $data->TipoRol=$request->TipoRol;
        $data->NickName=$request->NickName;
        $data->Email=$request->Email;
        $data->NombreCompleto=$request->NombreCompleto;
        $data->PasswordSALT=password_hash($request->PasswordSALT,PASSWORD_DEFAULT,array('cost' => 9));
        $data->PasswordHASH=password_hash($request->PasswordHASH, PASSWORD_DEFAULT, array('cost' => 9));
        // $paswordHASH = password_hash( $data->PasswordHASH, PASSWORD_DEFAULT);
        $data->Activo = "1";
        $data->UsuarioCreacion = "1";
        $data->UserCreated = "1";
        // if($request->PasswordSALT != $request->PasswordHASH){
        //     echo "contraseñas distintas";

        // }else{
        //     $data->save();
        //     return redirect('/usuarios')->with('success','Data has been added.');
        // }
        $data->save();
        return redirect('/usuarios')->with('success','Data has been added.');
        

        
        // if($ref=='front'){
        //     return redirect('register')->with('success','Data has been saved.');
        // }

        
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
        // $data= Usuario::find($id);
        // return view('parametros.usuario.edit',['data'=>$data]);
        $ObjUsuario = $this->UsuarioModel::find($id);
        $usuarios = new Usuario();

        return view('parametros.usuario.edit')->with('ObjUsuario', $ObjUsuario)->with('usuarios', $usuarios->getListadoActivos());
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
        // $datosUsuario = request()->except(['_token', '_method']);  //Evita que tomemos valores innecesarios (toker y method)
        // Usuario::wherE('id','=',$id)->update($datosUsuario);//ejecuto la intrucción where buscando el id que fue solicitado y hacemos un update usando la información de datos usuarios
        // $usuario = Usuario::findOrFail($id);
        // return redirect('/usuarios');
        $request->validate([
            'TipoRol'=>'required',
            'NickName'=>'required',
            'Email'=>'required',
            'NombreCompleto'=>'required',
            'PasswordSALT'=>'required',
            'PasswordHASH'=>'required',
            'Activo'=>'required'
        ]);

       
        
        $data=Usuario::find($id);
        $data->TipoRol=$request->TipoRol;
        $data->NickName=$request->NickName;
        $data->Email=$request->Email;
        $data->NombreCompleto=$request->NombreCompleto;
      
        $data->PasswordSALT=password_hash($request->PasswordSALT,PASSWORD_DEFAULT,array('cost' => 9));
        $data->PasswordHASH=password_hash($request->PasswordHASH, PASSWORD_DEFAULT, array('cost' => 9));

        
        $data->Activo = "1";
        $data->UsuarioCreacion = "1";
        $data->UserCreated = "0";
       
        $data->save();
        return redirect('/usuarios')->with('success','Data has been updated.');
    }

    /**
     * Elimina en Base de datos el registro de la tabla categoría.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::destroy($id);
        return redirect('usuarios');
    }
   
}
