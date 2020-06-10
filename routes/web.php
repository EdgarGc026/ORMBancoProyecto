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

//Creamos una nueva ruta para projectController
Route::get('getAllProjects', 'ProjectController@getAllProjects');

// Queremos probar el nuevo metodo insertProject
Route::get('insertNewProject', 'ProjectController@insertProject');

// La ruta de actualizacion de Project
Route::get('updateProject', 'ProjectController@updateProject');

// La ruta donde vemos project congelados
Route::get('freezeProject', 'ProjectController@freezeProject');

// Ruta donde si es mayor a 15, se elimina
Route::get('deleteProject', 'ProjectController@deleteProject');

// Eliminar los primeros 10 registros
Route::get('deleteTenProject', 'ProjectController@deleteTenProject');
