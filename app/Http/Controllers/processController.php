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
      $productComments = DB::table('comments as c')->join('users as u','u.id','=','c.user_id')->select('u.id','u.image','u.name','c.comment','c.created_at')->where('product_id','=',$product)->where('approved','<>',0)->get();
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
    $idUser = base64_decode($idUser);
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

    public function selectedFile(Request $file){
      $filePath = storage_path()."/app/CSVS/CSVFile.txt";
      if (file_exists($filePath)){
        unlink($filePath);
      }

      $file->inputFile->storeas('CSVS','CSVFile.txt');
     
      $Scan = fopen($filePath, 'r');
   
      while(!feof($Scan)) {
          $line_to_register = fgets($Scan);
          $data = explode(",",$line_to_register);
         try {
            $product = new products;
            $product->name = $data[0];
            $product->description = $data[1];
            $product->image = $data[2];
            $product->quantity = $data[3];
            $product->price = $data[4];
            $product->categories_id = $data[5];
            $product->discount = $data[6];
            $product->save(); 
         } catch (\Exception $e) {
           echo nl2br("Se registró un error en la siguiente linea \n\n".$line_to_register."\n\n Favor de verificar los datos, revisé si son correctos hay datos faltantes. \n\n Estructura del archivo: \n Nombre: Nombre del producto (Debe ser único en la base de datos) \n Descripción: Descripción del producto \n Url de la imagen: Url de la imagen del producto \n Cantidad: Cantidad del producto \n Precio: Precio sin impuestos del producto \n Categoría: Número ID de la categoría \n Descuento: Descuento que se le aplicará al producto. \n\n *RECUERDE QUE LOS ATRIBUTOS DEL PRODUCTO DENTRO DEL ARCHIVO DEBEN SER SEPARADOS POR MEDIO DE UNA COMA \",\" Y CADA PRODUCTO OCUPARÁ UNA LINEA DEL ARCHIVO*");
           fclose($Scan);
           return;
         }
          
      } 
      fclose($Scan);
      exit;
     
    }

    
}
