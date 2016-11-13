<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sales as sales;
use App\userSales as user_sales;
use App\productSold as products_sold;
use App\products as products;
use App\ as users;

use DB;
class salesController extends Controller
{
    public function Buy(Request $item) {

    	$product_id=$item->input('inputProductId');

    	$checkAviable = products::find($product_id);

    	if (!$checkAviable->quantity) {
    		echo "SOLICITUD NO COMPLETADA, NO HAY SUFICIENTE PRODUCTO."
    		return '';
    	}
		//FALTA CHECAR LA INFORMACIONDE PAGO    	
    	 

    	$productPrice = $item->input('inputPrice');
    	$productDiscount = $item->input('inputDiscount');
    	$total= $productPrice - ( $productPrice * ($productDiscount / 100) );

    	$sale = new sales;
    	$sale->total = $total;
    	$sale->save();

    	$usersale= new user_sales;
    	$usersale->user_id=$item->input('inputUserId');
    	$usersale->sales_id=$sale->id;
    	$usersale->save();

    	$prouctsold= new products_sold;
    	$prouctsold->sales_id=$sale->id;
    	$prouctsold->product_id=$product_id;





    }
}
