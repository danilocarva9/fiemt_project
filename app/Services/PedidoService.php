<?php

namespace App\Services;
use App\Models\Pedido;
use App\Models\Produto;

class PedidoService {

    public function save($request){ 
        try{
            //Pega valores autenticos do produtos antes def inserir
            $produto = Produto::FindOrFail($request->produto);
            $pedido = new Pedido;
            $pedido->cliente_id = $request->cliente;
            $pedido->produto_id = $request->produto;
            $pedido->quantidade = $request->quantidade;
            $pedido->valor_unitario = $produto->valor_unitario;
            $pedido->valor_total = $request->quantidade * $produto->valor_unitario;
            $pedido->save();
        }catch(\Exception $e){
            return $status = ['status' => 'danger', 'message' => 'Ocorreu um erro ao cadastrar o pedido.'];
        }
        return $status = ['status' => 'success', 'message' => 'Pedido cadastro com sucesso.'];
    }


    public function update(int $id, $request){ 
        try{
            //Pega valores autenticos do produtos antes def inserir
            $produto = Produto::FindOrFail($request->produto);
            $pedido = Pedido::FindOrFail($id);
            $pedido->cliente_id = $request->cliente;
            $pedido->produto_id = $request->produto;
            $pedido->quantidade = $request->quantidade;
            $pedido->valor_unitario = $produto->valor_unitario;
            $pedido->valor_total = $request->quantidade * $produto->valor_unitario;
            $pedido->update();

        }catch(\Exception $e){
            return $status = ['status' => 'danger', 'message' => 'Ocorreu um erro ao atualizar o pedido.'];
        }
        return $status = ['status' => 'success', 'message' => 'Pedido cadastro com atualizado.'];
    }

}

   // $pedido = Pedido::FindOrFail($id);
        // $pedido->cliente_id = $request->cliente;
        // $pedido->produto_id = $request->produto;
        // $pedido->quantidade = $request->quantidade;
        // $pedido->valor_unitario = $request->valor_unitario;
        // $pedido->valor_total = $request->valor_total;
        // $pedido->update();