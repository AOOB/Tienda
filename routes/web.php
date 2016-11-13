<?php


Route::get('/', function () {
    return view('inicio');
});

Route::get('/Login', function () {
    return view('login');
});
Route::get('/Registro',function(){
	return view('signup');
});

Route::get('/AdminPanel',function (){
	return view ('adminPanel');
});
Route::get('/ModificarProducto','productController@ModificaciondeProducto');


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
Route::get('/Comprar','salesController@Buy')


Auth::routes();

Route::get('/home', 'HomeController@index');
