<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios as User;
<<<<<<< HEAD
<<<<<<< HEAD
use App\products as products;
=======
use App\categories;
use App\products;
>>>>>>> 51adbf8d39fcac10ca89efc99069782843d6bc4c
=======
use App\categories;
use App\products as products;
>>>>>>> cd558fa00a6bf9e64cf29145fe043feadbd1a86a
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
<<<<<<< HEAD
<<<<<<< HEAD
    public function ProductView($product){ 
      $dataProduct = products::find($product);
      $similarProducts = DB::table('products')->where('categories_id','=',$dataProduct->categories_id)->where('id','<>',$product)->limit(3)->get();
      $productComments = DB::table('comments as c')->join('users as u','u.id','=','c.user_id')->select('u.id','u.image','c.comment')->where('product_id','=',$product)->where('approved','<>',0)->get();
      
      return view('sales.productView', compact('dataProduct','similarProducts','productComments'));      
    }
=======
=======
>>>>>>> cd558fa00a6bf9e64cf29145fe043feadbd1a86a

    public function showCategories() {

    $dataCates = categories::all();
    
    $query="SELECT image,name,price FROM products ORDER BY sellers";
    $produc=products::select($query);

      return view('principal',compact('dataCates','produc'));
    }


<<<<<<< HEAD
   public function favorites($id) {
    
    
      $query="SELECT image,price FROM products ORDER BY sellers";
      $produc=products::select($query);
        return view('',compact('',''));
   }
>>>>>>> 51adbf8d39fcac10ca89efc99069782843d6bc4c
    
=======
    public function ProductView($product){ 
      $dataProduct = products::find($product);
      $similarProducts = DB::table('products')->where('categories_id','=',$dataProduct->categories_id)->where('id','<>',$product)->limit(3)->get();
      $productComments = DB::table('comments as c')->join('users as u','u.id','=','c.user_id')->select('u.id','u.image','c.comment')->where('product_id','=',$product)->where('approved','<>',0)->get();
      
      return view('sales.productView', compact('dataProduct','similarProducts','productComments'));      
    }  
   
   

   
>>>>>>> cd558fa00a6bf9e64cf29145fe043feadbd1a86a
}
