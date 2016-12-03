<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sales as sales;
use App\productSold as products_sold;
use App\products as products;
use App\payInfo as users_payInfo;
use DB;
class salesController extends Controller
{
    public function Buy(Request $item) {

    	$product_id=$item->input('inputProductId');
        $quantity=$item->input('inputQuantity');
    	$checkAviable = products::find($product_id);

    	if ( ($checkAviable->quantity - $quantity) <= 0) {
    		echo "SOLICITUD NO COMPLETADA, NO HAY SUFICIENTE PRODUCTO.";
            echo '<a href="Producto/'.$product_id.'"> Volver al Producto </a>';
    		return '';
    	}
		//FALTA CHECAR LA INFORMACIONDE PAGO
        $user_id=$item->input('inputUserId');     	
    	$checkPayInfo=DB::table('payment_information')->where('user_id','=',$user_id)->get();

        if (count($checkPayInfo)==0) {
            return Redirect('perfil/'.$user_id);
        }

        //EFECTUA PAGO!!

    	$productPrice = $item->input('inputPrice');
    	$productDiscount = $checkAviable->discount;
    	$total= $productPrice - ( $productPrice * ($productDiscount/100) );

    	$sale = new sales;
    	$sale->total = $total;
        $sale->user_id=$item->input('inputUserId');
    	$sale->save();

    	$prouctsold= new products_sold;
    	$prouctsold->sales_id=$sale->id;
    	$prouctsold->product_id=$product_id;
        $prouctsold->quantity=$quantity;
        $prouctsold->save();

        DB::table('products')->where('id','=',$product_id)->decrement('quantity',$quantity);

        return Redirect('/Producto/'.$product_id);
    }
    public function RequestList()
    {
        $dataRequests= DB::table('sales as s')->join('product_sold as ps','s.id','=','ps.sales_id')->join('users as u','u.id','=','s.user_id')->select('s.*','ps.product_id','ps.quantity','u.name as user_name','u.id as user_id')->where('s.approved','=','0')->orderBy('s.updated_at','desc')->get();
        
        return view ('adminpanel.userRequest', compact('dataRequests'));
    }
    public function FinishPurchase(Request $purchase) {   
        $request_id= $purchase->input('inputRequestId');
        $option = $purchase->input('inputOption');
        $product_id= $purchase->input('inputProductId');

        if (!$option){
            $sale = sales::find($request_id);
            $sale->approved=1;
           if($sale->save()){
            return Redirect ('/ListadoPedidos');
           } 
        }else{         
            $quantity=$purchase->input('inputQuantity');  
           if(DB::table('products')->where('id','=',$product_id)->increment('quantity',$quantity)) {
            $sale = sales::find($request_id);
            $sale->approved=2;
                if ($sale->save()) {
                      return Redirect ('/ListadoPedidos');          
                }
           } 

        }
        
        echo "<script> alert('Algo salió mal, verifiquelo con el WebMaster porfavor.'); </script>";
        return '';
    }
}
