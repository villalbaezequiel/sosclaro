@extends('layouts.backend')

@section('title', "Regiones")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/regions/create') }}">Nueva Region</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_cities" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($regions as $region)
        <tr>
            <td>{{ $region->id }}</td>
            <td>{{ $region->name }}</td>
            <td>{{ \App\Functions::getActive($region->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.regions.destroy', $region->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/regions/'.$region->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    
    $.ajax({
        type: 'GET',
        url: '/admin/regions/getRegions',
        dataType: 'json',
        success: function(data){
            console.log(data);
        },
        error: function(xhr, status){
            console.log('Error: '+xhr);
        }
    });
    
    $("#list_cities").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    
});
</script>
@endsection