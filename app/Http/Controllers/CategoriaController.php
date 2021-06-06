<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreUpdateCategoriaRequest;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::get();
        return view('categoria.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoriaRequest $request)
    {
        $categoria = new Categoria;
        $categoria->nome = $request->nome;
        $categoria->save();

        return redirect('sys/categorias')->with('status', __('messages.success_inserted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::FindOrFail($id);
        return view('categoria.edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $categoria = Categoria::FindOrFail($id);
        $categoria->nome = $request->nome;
        $categoria->update();

        return redirect('sys/categorias')->with('status', __('messages.success_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::FindOrFail($id);
        $categoria->delete();
        return redirect('sys/categorias')->with('status', __('messages.success_deleted'));
    }
}
