@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1>Clientes</h1>
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

<div class="mt-2 mb-3">
<a class="btn btn-success btn-lg" href="{{ url('clientes/novo') }}">Novo Cliente</a>
</div>

@if (session('status'))
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>{{ session('status') }}</strong>
</div>
@endif

<div class="table-responsive">
<table class="table table-striped table-sm">
<thead>
<tr>
<th>#</th>
<th>Nome</th>
<th>Nascimento</th>
<th>CPF</th>
<th>Email</th>
<th>Opções</th>
</tr>
</thead>
<tbody>
@foreach($clientes as $c)
    <tr>
    <td>{{ $c->id }}</td>
    <td>{{ $c->nome }}</td>
    <td>{{ date('d/m/Y' , strtotime($c->nascimento)) }}</td>
    <td>{{ $c->cpf }} </td>
    <td>{{ $c->email }}</td>
    <td>

    <a href="{{ url('clientes/editar', $c->id) }}" class="btn btn-sm btn-primary"> editar </a>
    <form method="POST" action="{{ url('clientes/excluir', $c->id) }}">
        @csrf @method('delete')
        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
    </form>
    </td>
    </tr>
@endforeach
</tbody>
</table>
</div>

@endsection