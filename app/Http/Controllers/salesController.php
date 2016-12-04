<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sales as sales;
use App\productSold as products_sold;
use App\products as products;
use App\payInfo as users_payInfo;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\processController;
use DB;
class salesController extends Controller
{
    public function Buy() {


    	foreach (Cart::content() as $product) {
            $product_stock= products::find($product->id);
            if ( ($product_stock->quantity - $product->qty) <= 0) {
                echo "SOLICITUD NO COMPLETADA, NO HAY SUFICIENTE PRODUCTO DE LO SIGUIENTE:";
                echo $product->name;
            return '';
            }
        }
        
		$current_User = Auth::user();
        $checkPayInfo=DB::table('payment_information')->where('user_id','=',$current_User->id)->get();

        if (count($checkPayInfo)==0) {
            return Redirect('perfil/'.$current_User->id);
        }

        //EFECTUA PAGO!!

    	$sale = new sales;
    	$sale->total = (float)str_replace(',', '',Cart::total());
        $sale->user_id=$current_User->id;
    	$sale->save();

        foreach (Cart::content() as $product) {
            $prouctsold= new products_sold;
            $prouctsold->sales_id=$sale->id;
            $prouctsold->product_id=$product->id;
            $prouctsold->quantity=$product->qty;
            $prouctsold->save();
            DB::table('products')->where('id','=',$product->id)->decrement('quantity',$product->qty);    
        }

        Cart::destroy();
    	
        return Redirect('/ListaProductos');
    }
    public function RequestList()
    {
        $dataRequests= DB::table('sales as s')->join('users as u','u.id','=','s.user_id')->select('s.*','u.name as user_name','u.id as user_id')->where('s.approved','=','0')->orderBy('s.updated_at','desc')->get();
        
        return view ('adminpanel.userRequest', compact('dataRequests'));
    }
    public function FinishPurchase(Request $purchase) {   
        $request_id= $purchase->input('inputRequestId');
        $option = $purchase->input('inputOption');

        if (!$option){
            $sale = sales::find($request_id);
            $sale->approved=1;
                
           if($sale->save()){
            $user_id = $purchase->input('inputUserID');
            $process = new processController;
            $process->enviar_email($user_id);
            return Redirect ('/ListadoPedidos');
           } 
        }else{         
           $products = DB::table('product_sold')->where('sales_id', '=', $request_id)->get();

           foreach ($products as $product) {
                DB::table('products')->where('id','=',$product->product_id)->increment('quantity',$product->quantity);
                 $product_delete = products_sold::find($product->id);
                 $product_delete->delete();
           }

           $sale = sales::find($request_id);

           $sale->delete();
           
           return Redirect ('/ListadoPedidos');

        }
        
        echo "<script> alert('Algo salió mal, verifiquelo con el WebMaster porfavor.'); </script>";
        return '';
    }
}
