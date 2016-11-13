<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios as User;
use App\categories;
use App\products;
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

    public function showCategories() {

     $dataCates = categories::all();

      return view('principal',compact('dataCates'));
   
   }

   public function favorites($id) {
    
    
      $query="SELECT image,price FROM products ORDER BY sellers";
      $produc=products::select($query);
        return view('',compact('',''));
   }
    
}
