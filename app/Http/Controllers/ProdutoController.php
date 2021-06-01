<?php

namespace App\Http\Controllers;

use App\Models\Produto;
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
        return view('produto.create');
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
            'nome' => 'required|string|min:1',
            'categoria' => 'required|string|min:1',
            'descricao' => 'required|string|min:1'
        ]);

        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->categoria = $request->categoria;
        $produto->descricao = $request->descricao;
        $produto->save();

        return redirect('/produtos')->with('status', 'Produto cadastro com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::FindOrFail($id);
        return view('produto.edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   
        request()->validate([
            'nome' => 'required|string|min:1',
            'categoria' => 'required|string|min:1',
            'descricao' => 'required|string|min:1'
        ]);

        $produto = Produto::FindOrFail($id);
        $produto->nome = $request->nome;
        $produto->categoria = $request->categoria;
        $produto->descricao = $request->descricao;
        $produto->update();

        return redirect('/produtos')->with('status', 'Produto salvo com sucesso.');
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
        return redirect('/produtos')->with('status', 'Produto excluído com sucesso.');
    }
}
