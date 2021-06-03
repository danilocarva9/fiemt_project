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

<div class="mt-2 mb-3">
<a class="btn btn-success btn-lg" href="{{ url('pedidos/novo') }}">Novo Pedido</a>
</div>


@if (session('status'))
<div class="alert alert-{{ session('status') }}" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>{{ session('message') }}</strong>
</div>
@endif

<div class="table-responsive">
<table class="table table-striped table-sm">
<thead>
<tr>
<th>#</th>
<th>Cliente</th>
<th>Produto</th>
<th>Qtd.</th>
<th>Valor Unitário</th>
<th>Valor Total</th>
<th>Opções</th>
</tr>
</thead>
<tbody>
@foreach($pedidos as $p)
    <tr>
    <td>{{ $p->id }}</td>
    <td>{{ $p->cliente->nome }}</td>
    <td>{{ $p->produto->nome }}</td>
    <td>{{ $p->quantidade }}</td>
    <td>{{  'R$ '.number_format($p->valor_unitario, 2, ',', '.') }}</td>
    <td>{{  'R$ '.number_format($p->valor_total, 2, ',', '.') }}</td>
    <td>
    <a href="{{ url('pedidos/editar', $p->id) }}" class="btn btn-sm btn-primary"> editar </a>
    <form method="POST" action="{{ url('pedidos/excluir', $p->id) }}">
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