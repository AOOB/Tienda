<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios as User;
use App\categories;
use App\products as products;
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
   		 	echo "<script>alert('Usted no cuenta con los permisos para acceder aquí.');<script>"; 	
  			return Redirect('Principal');
  		 }

   	}

    public function showCategories() {

    $dataCates = categories::all();
  
      $produc=DB::table('products')->select('id','image','name','price')->orderBy('sellers','DESC')->get();
      return view('principal',compact('dataCates','produc'));
    }

    public function ProductView($product){ 
      $dataProduct = products::find($product);
      $similarProducts = DB::table('products')->where('categories_id','=',$dataProduct->categories_id)->where('id','<>',$product)->limit(3)->get();
      $productComments = DB::table('comments as c')->join('users as u','u.id','=','c.user_id')->select('u.id','u.image','c.comment')->where('product_id','=',$product)->where('approved','<>',0)->get();
      $checkIfCanVote = DB::table('sales as s')->join('product_sold as ps','ps.sales_id','=','s.id')->select('s.user_id')->where('ps.product_id','=',$product)->get();
      return view('sales.productView', compact('dataProduct','similarProducts','productComments','checkIfCanVote'));      
    }

    public function showProductOfCategories($idcat) {

    $prod=DB::table('products')->select('id','image','name','price','quantity')->where('categories_id','=',$idcat)->get();
    return view('showForCategories',compact('prod'));
    }

    public function showAllProducts() {

    $prod=products::all();
    return view('allProducts',compact('prod'));
    }
    public function pdf()
       {

        $vista=view('pdf');
        $dompdf=\App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream();
    }
}
