@extends('layouts.app')
@section('content')




<form method="POST" action="{{ url('cadastrar-pedido') }}" enctype="multipart/form-data">
    @csrf
   
  <div class="form-group">
    <label for="exampleInputEmail1">Cliente</label>
    <select name="cliente" class="form-control" id="cliente">
        @foreach($data['clientes'] as $c)
            <option value="{{ $c->id }}">{{ $c->nome }}</option>
        @endforeach
    </select>
    <small id="clienteHelp" class="form-text text-muted">Digite o nome do cliente.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Produto</label>
    <select name="produto" class="form-control" id="exampleFormControlSelect2">
        @foreach($data['produtos'] as $p)
            <option value="{{ $p->id }}">{{ $p->nome }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="quantidade_produto">Qtd. Produto</label>
    <input type="number" class="form-control" name="quantidade_produto">
    <small class="form-text text-muted">Quantidade do produto.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Valor Unitário</label>
    <input type="number" class="form-control" id="valor_unitario" name="valor_unitario">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Valor Total</label>
    <input type="number" class="form-control" id="valor_total" name="valor_total">
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

  <button type="submit" class="btn btn-success">Cadastrar Pedido</button>
 
</form>

@endsection