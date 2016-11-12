<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products as products;
use App\categories as categories;

class productController extends Controller
{

	public function ListadoProductos() {
   		$dataProducts=products::all();
   		return view('adminpanel.productslist')->with('dataProducts', $dataProducts);
   	}

   	public function ModificaciondeProducto($value){	
   	
      	$dataProduct=products::find($value)->First();
   	   $categories=categories::all();  
      	return view('adminpanel.modificaproducto',compact('dataProduct','categories'));

   	}

   public function newProduct(Request $request)
   {
      $product = new products;
      $product->name = $request->input('inputName');
      $product->description = $request->input('inputDescription');
      $product->image = $request->input('inputImage');
      $product->quantity = $request->input('inputQuantity');
      $product->price = $request->input('inputPrice');
      $product->categories_id = $request->input('inputCategory');

      if ($product->save()) {
         return view('adminpanel.newProduct')->with('categories', categories::all());
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

   public function ProductModify(Request $dataToUpdate)
   {
      $dataProduct = products::find($dataToUpdate->input('id'));

      $dataProduct->name = $dataToUpdate->input('inputName');
      $dataProduct->description = $dataToUpdate->input('inputDescription');
      $dataProduct->quantity = $dataToUpdate->input('inputQuantity');
      $dataProduct->price = $dataToUpdate->input('inputPrice');
      $dataProduct->valoration = $dataToUpdate->input('inputValoration');
      $dataProduct->categories_id = $dataToUpdate->input('inputCategory');
      $dataProduct->sellers = $dataToUpdate->input('inputSellers');
      $dataProduct->discount = $dataToUpdate->input('inputDiscount');

      if ($dataProduct->save()) {
         $categories=categories::all();  
         return view('adminpanel.modificaproducto',compact('dataProduct','categories'));
      } else {
         echo "<script> alert('Hubo un error al modificar el registro, intente de nuevo más tarde')</script>";
      }

   }

   public function ShowCategory() {
      $categoryData = categories::all();

      return view('adminpanel.addCategory')->with('categories',$categoryData);
   }


   public function newCategory(Request $Category) {
      $categoryToSave = new categories;

      $categoryToSave->name = $Category->input('inputName');

      
      $categoryToSave->save();
      
      return Redirect('/showCategory');
   }

   public function DeleteCategory($Category_id) {
      $categoryToDelete = categories::find($Category_id);
      $categoryToDelete->delete();
      
      return Redirect('/showCategory');
   }

   public function prepareScreen() {
      $categories= categories::all();

      return view('adminpanel.newProduct')->with('categories', $categories);
   }
}
