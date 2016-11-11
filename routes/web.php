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
Route::get('/principal',function(){
	return view('principal');
});
Route::get('/AdminPanel',function (){
	return view ('adminPanel');
});

Route::get('/nuevoProducto',function (){
	return view ('adminpanel.newProduct');
});

Route::get('/newProduct','productController@newProduct');

Route::get('/ListadoProductos','productController@ListadoProductos');

Route::get('/ModificarProducto/{id}','productController@ModificaciondeProducto');

Route::get('/perfil',function (){
	return view ('profile');
});

Route::get('/Image',function (){
	return view ('changeImage');
});


Route::get('/calando', 'usuariosController@ModifImage');

Route::get('/Configuracion',function (){
	return view ('configuracion');
});

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

Auth::routes();

Route::get('/home', 'HomeController@index');
