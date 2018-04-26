@extends('layouts.backend')

@section('title', "Usuarios / Listado DNI")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/dni/create') }}">Importar Lista DNI</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_dni" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>DNI</th>
            <th>Indicador</th>
            <th>Puntos</th>
            <th>Usuario Relacionado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dnis as $dni)
        <tr>
            <td>{{ $dni->id }}</td>
            <td>{{ $dni->dni }}</td>
            <td>{{ \App\Indicadores::getNameJson($dni->indicador) }}</td>
            <td>{{ $dni->puntos }}</td>
            <td>
                @if($dni->id_user == 0) 
                    No hay usuario relacionado/registrado 
                @else
                    {{ \App\User::getName($dni->id_user) }}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('content-footer')
<i>* Al Importar una Nueva Lista de números DNI, si el Numero DNI ya existe, se renovaran los puntos y indicador. Si un Numero DNI ya cargado no se encuentra en la Nueva Lista a Importar, se eliminara de la Base de Datos y si a la vez esta relacionada a un Usuario Activo, el mismo se dara de Baja automaticamente.</i>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_dni").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    
});
</script>
@endsection