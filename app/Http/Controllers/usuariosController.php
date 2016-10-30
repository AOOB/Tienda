<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use DB;
class usuariosController extends Controller
{
    public function RegistroNuevoUsuario(Request $request)
    {
        
        $userEmail=$request->input('email');
        $userAttempt=DB::table('usuarios')->where('email', $userEmail)->first();

        if (count($userAttempt)==1){
            echo "Registro fallido, el correo ya existe en nuestro servidor.";
            return view('signup');
        }else{
        	$nuevo = new usuarios;
        	$nuevo->nombre=$request->input('nombre');
        	$nuevo->apellido=$request->input('apellido');
        	$nuevo->email=$request->input('email');
    		$nuevo->contrasena=$request->input('password');
    		$nuevo->permisos=0;
    		$nuevo->save();
        }

		return Redirect('/Login');
    }
}
