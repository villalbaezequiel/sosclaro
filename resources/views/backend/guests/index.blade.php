@extends('layouts.backend')

@section('title', "Encuestas")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/guests/create') }}">Nueva Encuesta</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_guests" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Cantidad de Preguntas</th>
            <th>Puntos</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($guests as $guest)
        <tr>
            <td>{{ $guest->id }}</td>
            <td>{{ $guest->name }}</td>
            <td>{{ \App\Guest::getCountQuestions($guest->id) }}</td>
            <td>{{ $guest->puntos }}</td>
            <td>{{ \App\Functions::getActive($guest->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.guests.destroy', $guest->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/guests/'.$guest->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
    $("#list_guests").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection