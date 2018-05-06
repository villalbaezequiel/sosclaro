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
        <tr @if($exchange->status == 2) style="color:#007bff;" @endif>
            <td>{{ $exchange->id }}</td>
            <td>{{ \App\Dni::getName($exchange->id_user) }}</td>
            <td>{{ \App\Products::getCodigo($exchange->id_product) }}</td>
            <td>{{ \App\Products::getName($exchange->id_product) }}</td>
            <td>{{ \App\Exchanges::getStatus($exchange->status) }}</td>
            <td>
                @if($exchange->status == 2)
                    <a href="{{ url('/admin/exchanges/'.$exchange->id) }}" class="btn btn-outline-primary">Ver</a>
                @else
                    <a href="{{ url('/admin/exchanges/'.$exchange->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
                @endif
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