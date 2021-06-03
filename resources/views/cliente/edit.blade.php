@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1>Clientes</h1>
</div>

<form method="POST" action="{{ url('clientes/atualizar', $cliente->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="nome">Nome do Cliente</label>
    <input type="text" class="form-control" name="nome" value="{{old('nome', $cliente->nome)}}">
    @if ($errors->has('nome'))
     <span class="help-block">
     <small class="form-text text-danger">Por favor informe o nome do produto.</small>
     </span>
    @endif
    </div>

    <div class="form-group">
    <label for="nascimento">Nascimento do Cliente</label>
    <input type="text" class="form-control date" id="nascimento" name="nascimento" value="{{old('nascimento', date('d/m/Y' , strtotime($cliente->nascimento))) }}">
    @if ($errors->has('nascimento'))
     <span class="help-block">
     <small class="form-text text-danger">{{ $errors->first('nascimento') }}</small>
     </span>
    @endif

    </div>

    <div class="form-group">
    <label for="cpf">CPF do Cliente</label>
    <input type="text" class="form-control cpf" name="cpf" value="{{old('cpf', $cliente->cpf)}}">
    @if ($errors->has('cpf'))
     <span class="help-block">
     <small class="form-text text-danger">Por favor informe o cpf do cliente.</small>
     </span>
    @endif
    </div>

    <div class="form-group">
    <label for="email">Email do Cliente</label>
    <input type="text" class="form-control" name="email" value="{{old('email', $cliente->email)}}">
    @if ($errors->has('email'))
     <span class="help-block">
     <small class="form-text text-danger">Por favor informe o email do cliente.</small>
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

  <a href="{{ url('clientes')}}" class="btn btn-primary">Voltar</a>
  <button type="submit" class="btn btn-success">Salvar Cliente</button>
</form>

@endsection