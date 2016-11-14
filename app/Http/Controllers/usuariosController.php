<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use App\payInfo;
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

     
    public function ModifImage(Request $datImage) {
        
        $datUs=usuarios::find($datImage ->input('id'));
        $datUs->image=$datImage->input('image');

        if ($datUs->save())
        {
            echo "<script languaje='javascript' type='text/javascript'>window.close();</script> ";
            echo "<script languaje='javascript' type='text/javascript'>location.reload();</script> ";
        }else{
            echo "<script languaje='javascript' type='text/javascript'>alert('nel pastel error');</script> ";

        }

        return TRUE;
    }

    public function pagosModify(Request $dataToModify)
   {
      

      $id=$dataToModify->input('user_id');
      $modificar=DB::table('payment_information')->where('user_id', $id)->first();

      if(count($modificar)>0)
      {
      $dataPago = payInfo::find($modificar->id); 
      $dataPago->user_id = $dataToModify->input('user_id');
      $dataPago->name = $dataToModify->input('name');
      $dataPago->firtLastname = $dataToModify->input('firtLastname');
      $dataPago->address = $dataToModify->input('address');
      $dataPago->country = $dataToModify->input('country');
      $dataPago->state = $dataToModify->input('state');
      $dataPago->city = $dataToModify->input('city');
      $dataPago->plastic_number = $dataToModify->input('plastic_number');
      $dataPago->expiration_date = $dataToModify->input('expiration_date');
      $dataPago->CVV = $dataToModify->input('CVV');
      $dataPago->postal_code = $dataToModify->input('postal_code');
      }
      else{
      $dataPago = new payInfo; 
      $dataPago->user_id = $dataToModify->input('user_id');
      $dataPago->name = $dataToModify->input('name');
      $dataPago->firtLastname = $dataToModify->input('firtLastname');
      $dataPago->address = $dataToModify->input('address');
      $dataPago->country = $dataToModify->input('country');
      $dataPago->state = $dataToModify->input('state');
      $dataPago->city = $dataToModify->input('city');
      $dataPago->plastic_number = $dataToModify->input('plastic_number');
      $dataPago->expiration_date = $dataToModify->input('expiration_date');
      $dataPago->CVV = $dataToModify->input('CVV');
      $dataPago->postal_code = $dataToModify->input('postal_code');
     }

      if($dataPago->save())
      {
        return Redirect("/perfil/".$dataToModify->user_id);
      }
      
   }

   
    public function mostrarInfoPago($id) {
      $dataPagos = DB::table('payment_information')->where('user_id','=',$id)->get();
    
      return view('profile',compact('dataPagos'));
   }

   public function userDatosMod(Request $datosUser)
   {
      
      $dataToUpdate= usuarios::find($datosUser->input('id'));
      $dataToUpdate->name = $datosUser->input('name');
      $dataToUpdate->lastname = $datosUser->input('lastname');
      $dataToUpdate->email = $datosUser->input('email');
     

      if($dataToUpdate->save())
      {
        return Redirect("/perfil/".$datosUser->id);
      }  
   }

   

}
