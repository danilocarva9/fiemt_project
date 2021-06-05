@extends('layouts.app_inside')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1>Categoria de Produtos</h1>
</div>

<form id="form" method="POST" action="{{ url('sys/categorias/atualizar', $categoria->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="nome">Nome da Categoria</label>
    <input type="text" class="form-control" name="nome" value="{{old('nome', $categoria->nome)}}">
    @if ($errors->has('nome'))
     <span class="help-block">
     <small class="form-text text-danger">Por favor informe o nome do produto.</small>
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

  <a href="{{ url('sys/categorias')}}" class="btn btn-primary">Voltar</a>
  <button type="submit" class="btn btn-success">Salvar Categoria</button>
</form>

@endsection