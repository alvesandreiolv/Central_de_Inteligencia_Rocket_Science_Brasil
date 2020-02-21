<?php

//Retorna para a página WELCOME
Route::get('/', function () { return view('welcome/welcome'); })->name('welcome');;

Auth::routes();

Route::get('/inicio', 'InicioController@index')->name('inicio');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/perfil', 'PerfilController@index')->name('perfil');
Route::get('/perfil/editar', 'PerfilController@editarperfilformulario')->name('editarperfilformulario');
Route::post('/perfil/editar', 'PerfilController@editarperfil')->name('editarperfil');

//O GRUPO ABAIXO RESTRINGE O ACESSO PARA TODOS QUE NÃO FOREM ADMINISTRADORES
Route::group(['middleware' => 'App\Http\Middleware\ChecarAdministrador'], function()
{
Route::get('/administrador', 'AdministradorController@index')->name('administrador');
Route::get('/membros', 'MembrosController@index')->name('membros');
Route::get('/membros/ver', 'MembrosController@vermembro')->name('vermembro');
Route::get('/membros/editar', 'MembrosController@editarmembroformulario')->name('editarmembroformulario');
Route::post('/membros/editar', 'MembrosController@editarmembro')->name('editarmembro');
Route::get('/membros/bloquear', 'MembrosController@bloquearmembro')->name('bloquearmembro');
});