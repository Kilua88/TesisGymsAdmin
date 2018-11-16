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

Auth::routes();
Route::get('storage/{archivo}', function ($archivo) {
    $files = Storage::allFiles(Auth::user()->id);
     //verificamos si el archivo existe y lo retornamos
     foreach( $files as $file){
          if ($file == $archivo)
          {
              return Storage::response($archivo);
             
          }
     //si no se encuentra lanzamos un error 404.
        }
 
});
Route::post('storage/create', 'StorageController@save');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('formulario', 'StorageController@index');
Route::resource('gimnasios', 'GimnasioController')->middleware('auth', 'rol:admin');
Route::resource('actividades', 'ActividadesController');
Route::resource('imagenes', 'ImagenController');
Route::resource('cuotas', 'DetalleCuotasController');
Route::resource('inscripciones', 'InscripcionesController');
Route::resource('clientes', 'ClienteController');
Route::resource('instructores', 'InstructorController');
Route::resource('perfiles', 'PerfilController');

Route::get('/{slug}', 'HomeController@index');
