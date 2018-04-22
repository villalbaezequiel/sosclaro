@extends('layouts.backend')

@section('title', "Usuarios / Indicadores")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/indicadores/create') }}">Nuevo Indicador</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_indicador" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($indicadores as $indicador)
        <tr>
            <td>{{ $indicador->id }}</td>
            <td>{{ $indicador->name }}</td>
            <td>{{ \App\Functions::getActive($indicador->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.indicadores.destroy', $indicador->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/indicadores/'.$indicador->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
    
    $("#list_indicador").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    
});
</script>
@endsection