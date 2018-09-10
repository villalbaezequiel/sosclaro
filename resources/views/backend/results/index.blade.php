@extends('layouts.backend')

@section('title', "Resultados/Desempeños")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/results/create') }}">Importar</a>
<!--<a class="btn btn-primary mb-3" href="{{ url('/admin/results') }}">Exportar</a>-->
@endsection

@section('content')
<table class="table table-bordered" id="list_results" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID_user</th>
            <th>Categoria</th>
            <th>Mes</th>
            <th>Region</th>
            <th>Puntos</th>
            <th>Desempeño</th>
            <th>Puesto</th>
            <th>Fecha Creacion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $result)
        <tr>
            <td>{{ $result->id_user }}</td>
            <td>{{  \App\ResultsCategories::getNameCategory($result->id_category) }}</td>
            <td>{{ \App\Functions::getNameMonth($result->month) }}</td>
            <td>{{ \App\Regions::getName($result->id_region) }}</td>
            <td>{{ $result->puntos }}</td>
            <td>{{ $result->desempeno }}</td>
            <td>{{ $result->puesto }}</td>
            <td>{{ \App\Functions::getDate($result->created_at) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_results").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection