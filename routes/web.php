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

Route::post('/RegistroNuevoUsuario','usuariosController@RegistroNuevoUsuario');

Route::post('/Login','sesionsController@Login');
