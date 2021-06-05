<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
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

//Login - Demais rotas do fortify estão em: vendor/laravel/fortify/routes/routes.php
Route::get('/', function () {
    return view('auth.login');
});

Route::get('sys/dashboard', [IndexController::class, 'index'])->middleware('auth');

Route::group(['prefix' => 'sys', 'middleware' => 'auth'], function () {
    Route::get('pedidos/novo', [PedidoController::class, 'create']);
    Route::post('pedidos/cadastrar', [PedidoController::class, 'store']);
    Route::get('pedidos/editar/{id}', [PedidoController::class, 'edit']);
    Route::post('pedidos/atualizar/{id}', [PedidoController::class, 'update']);
    Route::delete('pedidos/excluir/{id}', [PedidoController::class, 'destroy']);
});

Route::group(['prefix' => 'sys', 'middleware' => 'auth'], function () {
    Route::get('produtos', [ProdutoController::class, 'index']);
    Route::get('produtos/novo', [ProdutoController::class, 'create']);
    Route::post('produtos/cadastrar', [ProdutoController::class, 'store']);
    Route::get('produtos/editar/{id}', [ProdutoController::class, 'edit']);
    Route::post('produtos/atualizar/{id}', [ProdutoController::class, 'update']);
    Route::delete('produtos/excluir/{id}', [ProdutoController::class, 'destroy']);
});

Route::group(['prefix' => 'sys', 'middleware' => 'auth'], function () {
    Route::get('clientes', [ClienteController::class, 'index']);
    Route::get('clientes/novo', [ClienteController::class, 'create']);
    Route::post('clientes/cadastrar', [ClienteController::class, 'store']);
    Route::get('clientes/editar/{id}', [ClienteController::class, 'edit']);
    Route::post('clientes/atualizar/{id}', [ClienteController::class, 'update']);
    Route::delete('clientes/excluir/{id}', [ClienteController::class, 'destroy']);
});

