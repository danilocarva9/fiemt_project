<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::get();
        return view('pedido.index', ['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = ['clientes' => Cliente::get(), 'produtos' => Produto::get()];
        return view('pedido.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        request()->validate([
            'cliente' => 'required|int|min:1',
            'produto' => 'required|int|min:1',
            'quantidade' => 'required|int|min:1',
            'valor_unitario' => 'required|int',
            'valor_total' => 'required|int',
        ]);

        $pedido = new Pedido;
        $pedido->cliente_id = $request->cliente;
        $pedido->produto_id = $request->produto;
        $pedido->quantidade = $request->quantidade;
        $pedido->valor_unitario = $request->valor_unitario;
        $pedido->valor_total = $request->valor_total;
        $pedido->save();

        return redirect('/')->with('status', 'Pedido cadastro com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $pedido = Pedido::FindOrFail($id);
        $data = ['clientes' => Cliente::get(), 'produtos' => Produto::get()];
        return view('pedido.edit', ['pedido' => $pedido, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   
        request()->validate([
            'cliente' => 'required|int|min:1',
            'produto' => 'required|int|min:1',
            'quantidade' => 'required|int|min:1',
            'valor_unitario' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'valor_total' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $pedido = Pedido::FindOrFail($id);
        $pedido->cliente_id = $request->cliente;
        $pedido->produto_id = $request->produto;
        $pedido->quantidade = $request->quantidade;
        $pedido->valor_unitario = $request->valor_unitario;
        $pedido->valor_total = $request->valor_total;
        $pedido->update();

        return redirect('/')->with('status', 'Pedido salvo com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::FindOrFail($id);
        $pedido->delete();
        return redirect('/')->with('status', 'Pedido excluído com sucesso.');
    }
}
