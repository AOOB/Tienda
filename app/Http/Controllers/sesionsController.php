<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use DB;

class sesionsController extends Controller
{
    public function Login(Request $request)
    {
    	$userEmail=$request->input('logemail');
    	$userPasword=$request->input('logpassword');
		$userAttempt=DB::table('usuarios')->where('email', $userEmail)->first();

		if (count($userAttempt)!=0)
		{
			$recoveredPassword=$userAttempt->contrasena;
		}else{

			echo "El correo no pertenece a ninguna de nuestras cuentas.";
			return view ('Login');
		}

		if ($recoveredPassword!=$userPasword){
			echo "Hubo un error al momento de autentificar, revise la 'Contraseña' por favor.";	
    		return view('Login');
		}

		return view('/principal');
    }

   
}


