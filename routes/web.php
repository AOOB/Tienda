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
	return view ('newProduct');
});

Route::get('/ListadoProductos',function (){
	return view ('listadoProductos');
});

Route::get('/ModificarProducto',function (){
	return view ('editProduct');
});
Route::post('/RegistroNuevoUsuario','usuariosController@RegistroNuevoUsuario');

Route::post('/Login','sesionsController@Login');

Route::get('tryToIntoSectionAdmin','processController@tryToIntoSectionAdmin');


Auth::routes();

Route::get('/home', 'HomeController@index');
