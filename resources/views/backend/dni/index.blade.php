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
<a class="btn btn-success mb-3" href="{{ asset('assets/backend/docs/plantilla_import_dni.xlsx') }}">Descargar Plantilla Excel</a>

@endsection

@section('content')
<table class="table table-bordered" id="list_dni" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID_REGION</th>
            <th>DNI</th>
            <th>Puntos</th>
            <th>Usuario Relacionado</th>
            <th>Fecha Creacion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dnis as $dni)
        <tr>
            
            @if($dni->id_region != 0)
                <td>{{ $dni->id_region }}</td>
            @elseif($dni->id_user != 0)
                <td>{{ \App\UsersProfile::getIdRegion($dni->id_user) }}</td>
            @else
                <td>No hay region asociada.</td>
            @endif
            
            <td>{{ $dni->dni }}</td>
            <td>{{ $dni->puntos }}</td>
            <td>
                @if($dni->id_user == 0) 
                    No hay usuario relacionado/registrado 
                @else
                    {{ \App\Dni::getName($dni->id_user) }}
                @endif
            </td>
            <td>{{$dni->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('content-footer')
<i>* Al Importar una Nueva Lista de números DNI, si el Numero DNI ya existe, se renovaran los puntos y indicador.</i>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_dni").DataTable({
        aaSorting: [[4, 'desc']],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"

        }
    });
    
});
</script>
@endsection