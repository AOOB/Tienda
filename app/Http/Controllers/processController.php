<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios as User;
use DB;
class processController extends Controller
{
   	public function tryToIntoSectionAdmin($userEmail)
   	{ 


      $userAttempt=DB::table('users')->where('email', $userEmail)->first();
   		

       if ($userAttempt->accesscontrol==1){
   			echo "<script>alert('Sus datos fueron verificados satisfactpriamente, Proceda.');<script>"; 	
   			return Redirect('AdminPanel');
   		 }else{
   		 	echo "<script>alert('Usted no cuenta con lso permisos para acceder aquí.');<script>"; 	
  			return Redirect('Principal');
  		 }

   	}
    
}
