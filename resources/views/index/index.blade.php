@extends('layouts.app_inside')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1>Pedidos</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    <button type="button" class="btn btn-sm disabled btn-outline-secondary">Compartilhar</button>
    <button type="button" class="btn btn-sm disabled btn-outline-secondary">Exportar</button>
    </div>
    <button type="button" class="btn btn-sm disabled btn-outline-secondary dropdown-toggle">
    <span data-feather="calendar"></span>
    Esta semana
    </button>
</div>
</div>

<div class="mt-2 mb-3">
<a class="btn btn-success btn-lg text-capitalize" href="{{ url('sys/pedidos/novo') }}">{{ __('common.new') }} Pedido</a>
</div>

@if (session('status'))
<div class="alert alert-{{ session('status') }}" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>{{ session('message') }}</strong><br/>
    @if(session('data'))
    Pedido de número <b>#{{ session('data.data.id')}}</b><br/>
    Cliente: <b>{{ session('data.cliente_nome') }}</b><br/>
    Valor total: <b>{{  'R$ '.number_format(session('data.data.valor_total'), 2, ',', '.') }}</b>
    @endif
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
    <a href="{{ url('sys/pedidos/editar', $p->id) }}" class="btn btn-sm btn-primary float-left"> {{ __('common.edit') }} </a>

    <form method="POST" class="float-left ml-2" action="{{ url('sys/pedidos/excluir', $p->id) }}">
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