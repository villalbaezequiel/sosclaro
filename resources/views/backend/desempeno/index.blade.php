@extends('layouts.backend')

@section('title', "Usuarios / Desempeño (Usuarios Ganadores)")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/desempeno/create') }}">Importar Desempeño</a>
<a class="btn btn-primary mb-3" href="{{ url('/admin/desempeno/export') }}">Descargar Excel a completar</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_desempeno" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>DNI</th>
            <th>Region</th>
            <th>Puntos</th>
            <th>Indicador 1</th>
            <th>Indicador 2</th>
        </tr>
    </thead>
    <tbody>
        @foreach($desempenos as $desempeno)
        <tr>
            <td>{{ $desempeno->dni }}</td>
            <td>{{ \App\Regions::getName($desempeno->id_region) }}</td>
            <td>{{ $desempeno->puntos }}</td>
            <td>{{ $desempeno->indicador_1 }}</td>
            <td>{{ $desempeno->indicador_2 }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_desempeno").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    
});
</script>
@endsection