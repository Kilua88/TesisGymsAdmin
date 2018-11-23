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
use Illuminate\Support\Facades\Storage;
Route::get('/', function () {
    
    return view('welcome');
});

Route::domain('{account}.myapp.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        return view('/');
    });
});

Auth::routes();
Route::post('storage/create', 'StorageController@save');

Route::get('/home', 'HomeController@index')->name('home');

   

Route::get('/reportd', 'ReportsController@dias' );
Route::get('/reportm', 'ReportsController@meses' );
Route::get('/reports', 'ReportsController@semanas' );
Route::get('/reporta', 'ReportsController@asistencias' );


Route::get('asistencias/guardar', 'AsistenciaController@asist')->name('asist');
Route::get('formulario', 'StorageController@index');
Route::resource('gimnasios', 'GimnasioController')->middleware('auth', 'rol:admin');
Route::resource('actividades', 'ActividadesController');
Route::resource('imagenes', 'ImagenController');
Route::resource('cuotas', 'DetalleCuotasController');
Route::resource('asistencias', 'AsistenciaController');
Route::resource('inscripciones', 'InscripcionesController');
Route::resource('clientes', 'ClienteController');
Route::resource('instructores', 'InstructorController');
Route::resource('perfiles', 'PerfilController');

Route::get('/{slug}', 'HomeController@index');
