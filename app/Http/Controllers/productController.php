<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products as products;
class productController extends Controller
{

	public function ListadoProductos() {

   		$dataProducts=products::all();
   		return view('adminpanel.productslist')->with('dataProducts', $dataProducts);
   	}

   	public function ModificaciondeProducto($value){	
   		//$value=(($value+3)/20);
   		$dataProduct=products::find($value)->First();
   		//dd($dataProduct['attributes']['id']);
   		return view('adminpanel.modificaproducto')->with('dataProduct',$dataProduct);

   	}

}
