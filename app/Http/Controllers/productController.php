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

   	public function ModificaciondeProducto($value)
   	{
   		$dataProduct=products::find($value);

   	}
}
