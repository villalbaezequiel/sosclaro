@extends('layouts.backend')

@section('title', "Configuracion / Redes Sociales")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/settings/social_networks/create') }}">Nueva Red Social</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_social_networks" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>URL</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($social_networks as $social_network)
        <tr>
            <td>{{ $social_network->id }}</td>
            <td>{{ $social_network->name }}</td>
            <td>{{ $social_network->url }}</td>
            <td>{{ \App\Functions::getActive($social_network->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.settings.social_networks.destroy', $social_network->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/settings/social_networks/'.$social_network->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
    $("#list_social_networks").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection