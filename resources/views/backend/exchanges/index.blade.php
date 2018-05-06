@extends('layouts.backend')

@section('title', "Canjes")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/exchanges/export') }}">Exportar Canjes</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_exchanges" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Codigo Producto</th>
            <th>Nombre Producto</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($exchanges as $exchange)
        <tr>
            <td>{{ $exchange->id }}</td>
            <td>{{ \App\Dni::getName($exchange->id_user) }}</td>
            <td>{{ \App\Product::getNameJson($exchange->indicador) }}</td>
            <td>{{ $exchange->status }}</td>
            <td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_exchanges").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    
});
</script>
@endsection