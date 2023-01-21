<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/{op}','Auth\LoginController@showLoginForm')->name('login');
Route::post('login_form','Auth\LoginController@login')->name('login_form');
Route::post('materias', 'MateriasController@index')->name('materias.index');
Route::post('carreras', 'CarrerasController@index')->name('carreras.index');
Route::resource('cursos', 'CursosController');
Route::resource('asignaCarreras', 'AsignaCarreraController');
Route::resource('horarios', 'HorariosController');
Route::post('usuarios', 'UsuariosController@index')->name('usuarios.index');
Route::get('horarios.docente', 'HorariosController@horario_docente')->name('horarios.docente');
Route::get('aula_virtual', 'HorariosController@aula_virtual')->name('aula_virtual');

Route::resource('carreras', 'CarrerasController');
Route::resource('materias', 'MateriasController');
Route::resource('usuarios', 'UsuariosController');