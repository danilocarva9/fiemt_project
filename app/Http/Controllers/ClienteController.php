<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\ClienteMaiorIdade as RulesClienteMaiorIdade;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::get();
        return view('cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
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
            'nascimento' => [
                'required',
                 new RulesClienteMaiorIdade($request),
            ],
            'cpf' => 'required|string|unique:clientes|min:1',
            'email' => 'required|string|email|unique:clientes|min:1'
        ]);

        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->nascimento = $request->nascimento;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->save();

        return redirect('/clientes')->with('status', 'Cliente cadastro com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::FindOrFail($id);
        return view('cliente.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Cliente $cliente)
    {
        request()->validate([
            'nome' => 'required|string|min:1',
            'nascimento' => [
                'required',
                 new RulesClienteMaiorIdade($request),
            ],
            'cpf' => [
                'required',
                'string',
                Rule::unique('clientes')->ignore($id),
                'min:1'
            ],
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('clientes')->ignore($id),
                'min:1'
            ]
        ]);

        $cliente = Cliente::FindOrFail($id);
        $cliente->nome = $request->nome;
        $cliente->nascimento = $request->nascimento;
        $cliente->cpf = $request->cpf;
        $cliente->email = $request->email;
        $cliente->update();
        return redirect('/clientes')->with('status', 'Cliente salvo com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::FindOrFail($id);
        $cliente->delete();
        return redirect('/clientes')->with('status', 'Cliente excluído com sucesso.');
    }
}
