@extends('layouts.backend')

@section('title', "Bonus Track")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/bonus_track/create') }}">Importar</a>
<!--<a class="btn btn-primary mb-3" href="{{ url('/admin/bonus_track') }}">Exportar</a>-->
@endsection

@section('content')
<table class="table table-bordered" id="list_bonus_track" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Mes</th>
            <th>Region</th>
            <th>Puntos</th>
            <th>Desempeño</th>
            <th>Fecha Creacion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bonus_track as $result)
        <tr>
            <td>{{ \App\Dni::getName($result->id_user) }}</td>
            <td>{{  \App\BonusTrackCategories::getNameCategory($result->id_category) }}</td>
            <td>{{ \App\Functions::getNameMonth($result->month) }}</td>
            <td>{{ \App\Regions::getName($result->id_region) }}</td>
            <td>{{ $result->puntos }}</td>
            <td>{{ round($result->desempeno, 2) }}</td>
            <td>{{ \App\Functions::getDate($result->created_at) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_bonus_track").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
            "order": [[ 6, "desc" ]]
        }
    });
});
</script>
@endsection