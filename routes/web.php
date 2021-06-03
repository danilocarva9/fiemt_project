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

Route::get('/', [IndexController::class, 'index']);

Route::prefix('pedidos')->group(function () {
    Route::get('/novo', [PedidoController::class, 'create']);
    Route::post('/cadastrar', [PedidoController::class, 'store']);
    Route::get('/editar/{id}', [PedidoController::class, 'edit']);
    Route::post('/atualizar/{id}', [PedidoController::class, 'update']);
    Route::delete('/excluir/{id}', [PedidoController::class, 'destroy']);
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutoController::class, 'index']);
    Route::get('/novo', [ProdutoController::class, 'create']);
    Route::post('/cadastrar', [ProdutoController::class, 'store']);
    Route::get('/editar/{id}', [ProdutoController::class, 'edit']);
    Route::post('/atualizar/{id}', [ProdutoController::class, 'update']);
    Route::delete('/excluir/{id}', [ProdutoController::class, 'destroy']);
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index']);
    Route::get('/novo', [ClienteController::class, 'create']);
    Route::post('/cadastrar', [ClienteController::class, 'store']);
    Route::get('/editar/{id}', [ClienteController::class, 'edit']);
    Route::post('/atualizar/{id}', [ClienteController::class, 'update']);
    Route::delete('/excluir/{id}', [ClienteController::class, 'destroy']);
});



