<?php


Route::get('/', 'processController@showCategories');

Route::get('/Login', function () {
    return view('login');
});
Route::get('/Registro',function(){
	return view('signup');
});

Route::get('/AdminPanel',function (){
	return view ('adminPanel');
});
Route::get('/ModificarProducto/{id}','productController@ModificaciondeProducto');


/////////////////////////////////////////////////77
Route::get('/perfil/{id}','usuariosController@mostrarInfoPago');

Route::get('/Image',function (){
	return view ('changeImage');
});
Route::get('/Configuracion',function (){
	return view ('configuracion');
});

Route::get('/calando', 'usuariosController@ModifImage');


Route::get('/pagosModify','usuariosController@pagosModify');
Route::get('/userDatosMod','usuariosController@userDatosMod');


Route::get('/mostrarInfoPago','usuariosController@mostrarInfoPago');

Route::get('/principal','processController@showCategories');


Route::get('/Productos/{id}','processController@showProductOfCategories');

Route::get('/TodosLosProductos','processController@showAllProducts');

Route::get('/pdf/{sales_id}','processController@pdf');

Route::get('/prueba/{id}', 'processController@enviar_email');


Route::get('/Compras/{user_id}','processController@compras');




/////////////////////////////////////////////////////////////////////////


Route::get('/EditarNombre',function (){
	return view ('changeName');
});

Route::post('/RegistroNuevoUsuario','usuariosController@RegistroNuevoUsuario');

Route::post('/Login','sesionsController@Login');

Route::get('tryToIntoSectionAdmin/{id}','processController@tryToIntoSectionAdmin');

Route::get('/changeProductPicture','productController@ChangePicture');
Route::get('/productModify','productController@ProductModify');
Route::get('/showCategory','productController@ShowCategory');
Route::get('/newCategory','productController@NewCategory');
Route::get('/deleteCategory/{id}','productController@DeleteCategory');
Route::get('/nuevoProducto','productController@prepareScreen');
Route::get('/newProduct','productController@newProduct');
Route::get('/ListadoProductos','productController@ListadoProductos');
Route::get('/Producto/{id}','processController@ProductView');
Route::get('/postAComment','commentsController@NewComment');
Route::get('/Comentarios','commentsController@ListComments');
Route::get('/commentAction','commentsController@CommentAction');
Route::get('/Comprar','salesController@Buy');
Route::get('/voteProduct','productController@VoteProduct');
Route::get('/ListadoPedidos','salesController@RequestList');
Route::get('/finishPurchase','salesController@FinishPurchase');
Route::get('/AddToCart','cartController@addToCart');
Route::get('/ListaProductos', function(){
	return view('cartStuff.cartList');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
