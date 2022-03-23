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
       
        $consulta = Usuario::where('NickName',$request->NickName)->get(); //permite comprobar si existe el usuario
        $cuantos = count ($consulta);//cuenta cuantos registros hay
        if($cuantos >0 and Hash::check($request->PasswordHASH, $consulta[0]->PasswordHASH)){
            $usuarioData = Usuario::where(['NickName'=>$request->NickName])->get();
            session(['usuarioData'=>$usuarioData]);
            return redirect("/dashboard");
        }
        else{
            return redirect('/')->with('msg', 'usuario/contraseña no valido!');
        }


       
    }

    function logout(){
        session()->forget(['usuarioData']);
        return redirect('/');
    }
}