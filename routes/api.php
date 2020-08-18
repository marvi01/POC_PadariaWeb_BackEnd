<?php

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
Route::resource('/Compra', 'compraController');
Route::resource('/Venda', 'vendaController');
Route::get('/VendaUser/{id}','vendaController@listVendaUser');
Route::get('/CompraUser/{id}','compraController@listCompraUser');
Route::get('/CompraVenda/{id}','compraController@compraShow');
Route::get('/Produtos', 'produtoController@index');
Route::get('/Produtos/{id}', 'produtoController@show');
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function ($router) {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');
});
//Route::get('/Produtos?page{page}&qtd{qtd}', 'produtoController@index')
Route::put('/Produtos/{id}', 'produtoController@update');
Route::delete('/Produtos/{id}', 'produtoController@destroy');
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('/Produtos', 'produtoController@store');
    Route::get('users/{id}', 'UserController@seusDados');
    Route::post('/Endereco', 'enderecoController@store');
    Route::get('/EnderecoList/{id}', 'enderecoController@listEndereco');
    Route::put('/Endereco/{id}', 'enderecoController@update');
    Route::get('/Endereco/{id}', 'enderecoController@show');
    Route::delete('/Endereco/{id}', 'enderecoController@destroy');

});

/*

Route::get('/Categoria', 'categoriaController@index');//->middleware('scope:administrador,usuario');
Route::get('/Categoria/{id}', 'categoriaController@show');//->middleware('scope:administrador,usuario');
//Route::get('/Categoria?page{page}&qtd{qtd}', 'categoriaController@index')->middleware('scope:administrador,usuario');
Route::post('/Categoria', 'categoriaController@store')->middleware('scope:administrador');
Route::put('/Categoria/{id}', 'categoriaController@update')->middleware('scope:administrador');
Route::delete('/Categoria/{id}', 'categoriaController@destroy')->middleware('scope:administrador');
 */
//
//});
