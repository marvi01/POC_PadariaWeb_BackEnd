<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/Produtos', 'produtoController');
Route::resource('/user', 'userController');


  /*  Route::get('/Produtos', 'produtoController@index');//->middleware('scope:administrador,usuario');
    Route::get('/Produtos/{id}', 'produtoController@show');//->middleware('scope:administrador,usuario');
    //Route::get('/Produtos?page{page}&qtd{qtd}', 'produtoController@index')->middleware('scope:administrador,usuario');
    Route::post('/Produtos', 'produtoController@store');//->middleware('scope:administrador');
    Route::put('/Produtos/{id}', 'produtoController@update')->middleware('scope:administrador');
    Route::delete('/Produtos/{id}', 'produtoController@destroy')->middleware('scope:administrador');
    
    Route::get('/Categoria', 'categoriaController@index');//->middleware('scope:administrador,usuario');
    Route::get('/Categoria/{id}', 'categoriaController@show');//->middleware('scope:administrador,usuario');
    //Route::get('/Categoria?page{page}&qtd{qtd}', 'categoriaController@index')->middleware('scope:administrador,usuario');
    Route::post('/Categoria', 'categoriaController@store')->middleware('scope:administrador');
    Route::put('/Categoria/{id}', 'categoriaController@update')->middleware('scope:administrador');
    Route::delete('/Categoria/{id}', 'categoriaController@destroy')->middleware('scope:administrador');
    */
    //Route::group(['middleware' => ['auth:api']], function () {
//});