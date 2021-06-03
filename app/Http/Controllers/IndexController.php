<?php

namespace App\Http\Controllers;

use App\Models\Pedido;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::get();
        return view('index.index', ['pedidos' => $pedidos]);
    }
   
}
