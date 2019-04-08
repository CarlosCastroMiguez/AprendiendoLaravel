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

Route::get('/home', 'HomeController@index');
Route::get('/seleccionar/proyecto/{id}', 'HomeController@selectProject');

Route::get('/report','HomeController@getReport');
Route::post('/report','HomeController@postReport');



Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {
    
    //usuarios
    Route::get('/usuarios','UserController@index');
    Route::post('/usuarios','UserController@store');
    
    Route::get('/usuario/{id}','UserController@edit');
    Route::post('/usuario/{id}','UserController@update');
    Route::get('/usuario/{id}/eliminar','UserController@delete');

    //proyectos
    Route::get('/proyectos','ProjectController@index');
    Route::post('/proyectos','ProjectController@store');
    
    Route::get('/proyecto/{id}','ProjectController@edit');
    Route::post('/proyecto/{id}','ProjectController@update');
    Route::get('/proyecto/{id}/eliminar','ProjectController@delete');
    Route::get('/proyecto/{id}/restaurar','ProjectController@restore');

    //category
    Route::post('/categorias','CategoryController@store');
    Route::post('/categoria/editar','CategoryController@update');
    Route::get('/categoria/{id}/eliminar','CategoryController@delete');
    
    //Levels
    Route::post('/niveles','LevelController@store');
    Route::post('/nivel/editar','LevelController@update');
    Route::get('/nivel/{id}/eliminar','LevelController@delete');
    
    //Project-User
    Route::post('/proyecto-usuario','ProjectUserController@store'); 
    Route::get('/proyecto-usuario/{id}/eliminar','ProjectUserController@delete');
    
    Route::get('/config','ConfigController@index');
});
