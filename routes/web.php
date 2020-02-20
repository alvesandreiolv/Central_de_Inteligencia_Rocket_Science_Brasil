<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome/welcome');
});

Auth::routes();

Route::get('/inicio', 'InicioController@index')->name('inicio');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/administrador', 'AdministradorController@index')->name('administrador');
Route::get('/membros', 'MembrosController@index')->name('membros');
Route::get('/membros/ver', 'MembrosController@vermembro')->name('vermembro');
Route::get('/membros/editar', 'MembrosController@editarmembroformulario')->name('editarmembroformulario');
Route::post('/membros/editar', 'MembrosController@editarmembro')->name('editarmembro');
Route::get('/membros/bloquear', 'MembrosController@bloquearmembro')->name('bloquearmembro');

Route::get('/perfil', 'PerfilController@index')->name('perfil');