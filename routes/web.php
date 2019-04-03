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

Route::get('/report','HomeController@getReport');
Route::post('/report','HomeController@postReport');



Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/usuarios','UserController@index');
    Route::post('/usuarios','UserController@store');
    
    Route::get('/usuario/{id}','UserController@edit');
    Route::post('/usuario/{id}','UserController@update');
    Route::get('/usuario/{id}/eliminar','UserController@delete');


    
    Route::get('/proyectos','ProjectController@index');
    Route::get('/config','ConfigController@index');
});
