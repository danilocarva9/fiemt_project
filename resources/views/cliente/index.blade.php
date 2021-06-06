@extends('layouts.app_inside')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1>Clientes</h1>
</div>

<div class="mt-2 mb-3">
<a class="btn btn-success btn-lg text-capitalize" href="{{ url('sys/clientes/novo') }}">{{ __('common.new') }} Cliente</a>
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

    <a href="{{ url('sys/clientes/editar', $c->id) }}" class="btn btn-sm btn-primary float-left"> {{ __('common.edit') }} </a>
    <form method="POST" class="float-left ml-2" action="{{ url('sys/clientes/excluir', $c->id) }}">
        @csrf @method('delete')
        <button type="submit" class="btn btn-sm btn-danger">{{ __('common.delete') }}</button>
    </form>
    </td>
    </tr>
@endforeach
</tbody>
</table>
</div>

@endsection