@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1>Produtos</h1>
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

<form method="POST" action="{{ url('produtos/cadastrar') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="nome">Nome do Produto</label>
    <input type="text" class="form-control" name="nome" value="{{old('nome')}}">
    @if ($errors->has('nome'))
     <span class="help-block">
     <small class="form-text text-danger">Por favor informe o nome do produto.</small>
     </span>
    @endif
    </div>

    <div class="form-group">
    <label for="categoria">Categoria do Produto</label>
    <input type="text" class="form-control" name="categoria" value="{{old('categoria')}}">
    @if ($errors->has('categoria'))
     <span class="help-block">
     <small class="form-text text-danger">Por favor informe a categoria do produto.</small>
     </span>
    @endif
    </div>
    
    <div class="form-group">
    <label for="descricao">Descrição do Produto</label>
    <textarea class="form-control" name="descricao">{{old('descricao')}}</textarea>
    @if ($errors->has('descricao'))
     <span class="help-block">
     <small class="form-text text-danger">Por favor informe a descrição do produto.</small>
     </span>
    @endif
    </div>


    <div class="form-group">
      <label for="exampleInputPassword1">Valor Unitário</label>
      <input type="text" class="form-control money" id="valor_unitario" name="valor_unitario" value="{{old('valor_unitario')}}">
      @if ($errors->has('valor_unitario'))
      <span class="help-block">
      <small class="form-text text-danger">Por favor informe o valor unitário do produto.</small>
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

  <a href="{{ url('produtos')}}" class="btn btn-primary">Voltar</a>
  <button type="submit" class="btn btn-success">Cadastrar Produto</button>
  
</form>

@endsection