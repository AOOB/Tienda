<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\products as products;
class cartController extends Controller
{
    public function addToCart(Request $item) {
    	$productId = $item->input('inputProductId');
    	$product_qtty = $item->input('inputQuantity');
    	$product = products::find($productId);

    	Cart::add($product->id,$product->name, $product_qtty, $product->price - ( $product->price * ($product->discount	/ 100)));

    	return Redirect('/ListaProductos');
    }
    public function editItem(Request $itemSelected){
    	$itemId = $itemSelected->input('inputId');
    	$quantity = $itemSelected->input('inputQuantity');
    	if ($quantity>=0){
    	Cart::update($itemId, $quantity);
   	 	return Redirect('/ListaProductos');
   	 	}
   	 	$this->removeItem($itemId);
    }

    public function removeItem($rowId) {
    	Cart::remove($rowId);
		return Redirect('/ListaProductos');
    }
}
