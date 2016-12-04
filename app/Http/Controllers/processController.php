<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios as User;
use App\categories;
use App\sales as sales;
use App\products as products;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
    public function pdf($id)
       {
         
        $prod=DB::table('product_sold as ps')->join('products as p','p.id','=','ps.product_id')->select('p.*','ps.*')->where('ps.sales_id','=',$id)->get();
        $sal=sales::find($id);
        $user= Auth::user();

        $vista=view('pdf', compact('prod','sal','user'));
        $dompdf=\App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream();
    }
    
    public function compras($idUser) {

    $sal=DB::table('sales')->select('id','user_id','total','created_at')->where('user_id','=',$idUser)->get();
    return view('compras',compact('sal'));
    }

    public function enviar_email($idUser) {
        $current_user = User::find($idUser);
        $current_user->id = base64_encode($current_user->id);
        $user = $current_user['attributes'];

        Mail::send("emails.correo", ['user' =>$user], function ($message)  use ($user){
        
          $message->to($user['email']); 
          $message->subject('Asunto del correo');
      });
    }

    
}
