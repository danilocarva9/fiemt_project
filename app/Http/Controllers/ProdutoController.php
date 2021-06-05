<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::get();
        return view('produto.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['categorias' => Categoria::get()];
        return view('produto.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProdutoRequest $request)
    {
        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->categoria_id = $request->categoria;
        $produto->descricao = $request->descricao;
        $produto->valor_unitario = $request->valor_unitario;
        $produto->save();

        return redirect('sys/produtos')->with('status', 'Produto cadastro com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    // public function show(Produto $produto)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::FindOrFail($id);
        $categorias = Categoria::get();
        return view('produto.edit', ['produto' => $produto, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreUpdateProdutoRequest $request)
    {   
        $produto = Produto::FindOrFail($id);
        $produto->nome = $request->nome;
        $produto->categoria_id = $request->categoria;
        $produto->descricao = $request->descricao;
        $produto->valor_unitario = $request->valor_unitario;
        $produto->update();

        return redirect('sys/produtos')->with('status', 'Produto salvo com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::FindOrFail($id);
        $produto->delete();
        return redirect('sys/produtos')->with('status', 'Produto excluído com sucesso.');
    }
}
