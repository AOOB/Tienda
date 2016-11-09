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

   public function newProduct(Request $request)
   {
      $product = new products;
      $product->name = $request->input('inputName');
      $product->description = $request->input('inputDescription');
      $product->image = $request->input('inputImage');
      $product->quantity = $request->input('inputQuantity');
      $product->price = $request->input('inputPrice');

      if ($product->save()) {
         return view('adminpanel.newProduct');
      } else {
         echo "<script> alert('Hubo un error al cargar el archivo, intente de nuevo más tarde')</script>";
      }

      return;

   }

   public function ChangePicture(Request $request)
   {
      $id= $request->input('id');
      $newUrl= $request->input('inputImage');
      $dataProduct=products::find($id);

      $dataProduct->image=$newUrl;
      
      if ($dataProduct->save()) {
         return view('adminpanel.modificaproducto')->with('dataProduct',$dataProduct);
      } else {
         echo "<script> alert('Hubo un error al modificar el registro, intente de nuevo más tarde')</script>";
      }
   }

   public function ProductModify(Request $dataProduct)
   {
      $dataToModify = products::find($dataProduct->input('id'));

      $dataToModify->name = $dataProduct->input('inputName');
      $dataToModify->description = $dataProduct->input('inputDescription');
      $dataToModify->quantity = $dataProduct->input('inputQuantity');
      $dataToModify->price = $dataProduct->input('inputPrice');
      $dataToModify->valoration = $dataProduct->input('inputValoration');
      $dataToModify->sellers = $dataProduct->input('inputSellers');
      $dataToModify->discount = $dataProduct->input('inputDiscount');

      if ($dataToModify->save()) {
         return view('adminpanel.modificaproducto')->with('dataProduct',$dataToModify);
      } else {
         echo "<script> alert('Hubo un error al modificar el registro, intente de nuevo más tarde')</script>";
      }

   }

}
