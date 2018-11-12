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
    
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('gimnasios', 'GimnasioController')->middleware('auth', 'rol:admin');
Route::resource('actividades', 'ActividadesController');

Route::resource('clientes', 'ClienteController');
Route::resource('instructores', 'InstructorController');

Route::get('/{slug}', 'HomeController@index');
