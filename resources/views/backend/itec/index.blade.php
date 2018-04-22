@extends('layouts.backend')

@section('title', "Usuarios / Listado ITEC")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/itec/create') }}">Importar Lista ITEC</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_itec" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>ITEC</th>
            <th>Indicador</th>
            <th>Puntos</th>
            <th>Usuario Relacionado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($itecs as $itec)
        <tr>
            <td>{{ $itec->id }}</td>
            <td>{{ $itec->itec }}</td>
            <td>{{ $itec->indicador }}</td>
            <td>{{ $itec->puntos }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('content-footer')
<i>* Al Importar una Nueva Lista de números ITEC, si el Numero ITEC ya existe, se renovaran los puntos y indicador. Si un Numero ITEC ya cargado no se encuentra en la Nueva Lista a Importar, se eliminara de la Base de Datos y si a la vez esta relacionada a un Usuario Activo, el mismo se dara de Baja automaticamente.</i>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_itec").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    
});
</script>
@endsection