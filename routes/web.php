<?php

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

// Route::get('/', function () {
//     return view('pedidos');
// });


// Route::group(['prefix' => ''], function () {
// 	Route::resource('', [PedidoController::class, 'index']);
//     Route::get('pedido/{id}', [PedidoController::class, 'show']);
// });


Route::prefix('')->group(function () {
    Route::get('/', [PedidoController::class, 'index']);
    Route::get('/novo-pedido', [PedidoController::class, 'create']);
    Route::post('/cadastrar-pedido', [PedidoController::class, 'store']);
});


