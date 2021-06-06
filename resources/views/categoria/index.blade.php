@extends('layouts.app_inside')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1>Categoria de Produtos</h1>
</div>

<div class="mt-2 mb-3">
<a class="btn btn-success btn-lg text-capitalize" href="{{ url('sys/categorias/novo') }}">{{ __('common.new2') }} Categoria</a>
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
<th>Opções</th>
</tr>
</thead>
<tbody>
@foreach($categorias as $c)
    <tr>
    <td>{{ $c->id }}</td>
    <td>{{ $c->nome }}</td>
    <td>
    <a href="{{ url('sys/categorias/editar', $c->id) }}" class="btn btn-sm btn-primary float-left"> {{ __('common.edit') }} </a>
    <form method="POST" class="float-left ml-2" action="{{ url('sys/categorias/excluir', $c->id) }}">
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