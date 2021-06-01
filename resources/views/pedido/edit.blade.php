@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1>Pedidos</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
    <span data-feather="calendar"></span>
    This week
    </button>
</div>
</div>

<form method="POST" action="{{ url('pedidos/atualizar', $pedido->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Cliente</label>
    <select name="cliente" class="form-control" id="cliente">
    <option value="" selected disabled>Selecione um Cliente</option>
        @foreach($data['clientes'] as $c)
            <option value="{{ $c->id }}" @if (old('cliente') == $c->id or $pedido->cliente_id == $c->id) selected="selected" @endif>{{ $c->nome }}</option>
        @endforeach
    </select>
    @if ($errors->has('cliente'))
      <span class="help-block">
      <small class="form-text text-danger">Por favor informe o nome do cliente.</small>
      </span>
      @endif
   </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Produto</label>
    <select name="produto" class="form-control" id="exampleFormControlSelect2">
        <option value="" selected disabled>Selecione um Produto</option>
        @foreach($data['produtos'] as $p)
            <option value="{{ $p->id }}" @if (old('produto') == $p->id or $pedido->produto_id == $p->id) selected="selected" @endif> {{ $p->nome }}</option>
        @endforeach
    </select>
      @if ($errors->has('produto'))
      <span class="help-block">
      <small class="form-text text-danger">Por favor selecione um produto.</small>
      </span>
      @endif
    </div>

    <div class="form-group">
    <label for="quantidade">Qtd. Produto</label>
    <input type="number" class="form-control" name="quantidade" value="{{old('quantidade', $pedido->quantidade)}}">
    @if ($errors->has('quantidade'))
     <span class="help-block">
     <small class="form-text text-danger">Por favor informe a quantidade do produto.</small>
     </span>
    @endif
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Valor Unitário</label>
      <input type="number" class="form-control" id="valor_unitario" name="valor_unitario" value="{{old('valor_unitario', $pedido->valor_unitario)}}">
      @if ($errors->has('valor_unitario'))
      <span class="help-block">
      <small class="form-text text-danger">Por favor informe o valor unitário do produto.</small>
      </span>
      @endif
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Valor Total</label>
      <input type="number" class="form-control" id="valor_total" name="valor_total" value="{{old('valor_total', $pedido->valor_total)}}">
      @if ($errors->has('valor_total'))
      <span class="help-block">
      <small class="form-text text-danger">Por favor informe o valor total do produto.</small>
      </span>
      @endif
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  <button type="submit" class="btn btn-success">Salvar Pedido</button>
</form>

@endsection