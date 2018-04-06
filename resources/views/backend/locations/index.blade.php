@extends('layouts.backend')

@section('title', "Ubicaciones")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/locations/create') }}">Nueva Ubicacion</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_cities" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Provincia</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
        <tr>
            <td>{{ $city->name }}</td>
            <td>{{ \App\Provinces::getProvince($city->id_province) }}</td>
            <td>{{ \App\Functions::getActive($city->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.locations.destroy', $city->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/locations/'.$city->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
        url: '/admin/locations/getRegions',
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