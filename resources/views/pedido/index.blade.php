@extends('layouts.app')
@section('content')


<div class="m-2 p-1">
<a class="btn btn-success btn-lg" href="{{ url('/novo-pedido') }}">Novo Pedido</a>
</div>


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
    <td>{{ $p->valor_unitario }}</td>
    <td>{{ $p->valor_total }}</td>
    <td>options</td>
    </tr>
@endforeach
</tbody>
</table>
</div>

@endsection