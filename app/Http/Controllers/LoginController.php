<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Session;
class LoginController extends Controller
{
    function login(){
        return view('login');
    }
    function check_login(Request $request){  //metodo que revisa los valores ingresados en los campos de la tabla sql
        $request->validate([
            'NickName' => 'required',
            'PasswordHASH' => 'required',
        ]);
        // $paswordEncriptado = Hash::make($request->PasswordHASH);
        // echo $paswordEncriptado;

        // $consulta = Usuario::where('NickName',$request->NickName)->get(); //permite comprobar si existe el usuario
        // $cuantos = count ($consulta);//cuenta cuantos registros hay
        // if($cuantos >0 and Hash::check($request->PasswordHASH, $consulta[0]->PasswordHASH)){
        //     echo"acceso concedido";
        // }
        // else{
        //     echo "acceso no permitido";
        // }


        // $consulta = Usuario::where(['NickName' =>$request->NickName, 'PasswordHASH'=>sha1($request->PasswordHASH)])->get();
        // $cuantos = count($consulta);
        // if($cuantos>0){
        //     $consultaData = Usuario::where(['NickName' =>$request->NickName, 'PasswordHASH'=>sha1($request->PasswordHASH)])->get();
        //     session(['consultaData'=>$consultaData]);
        //     return  'acceso concedido';
        // }else{
        //     echo 'acceso denegado';
        // }



        // $login = Usuario::where(['NickName' =>$request->NickName, 'PasswordHASH'=>sha1($request->PasswordHASH)])
        // ->count();
        // if($login>0){
        //     $loginData = Usuario::where(['NickName' =>$request->NickName, 'PasswordHASH'=>sha1($request->PasswordHASH)])
        //     ->get();
        //     session(['loginData'=>$loginData]);
        //     return redirect('dashboard');
        // }else{
        //     return redirect('/')->with('msg', 'Invalid username/password!');
        // }
    }
}
