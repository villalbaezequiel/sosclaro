@extends('layouts.backend')

@section('title', "Encuestas / Completas por Usuarios")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/guests/users/export/all') }}">Exportar Encuestas Completas por Usuarios</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_guest_questions" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Encuesta</th>
            <th>Usuario</th>
            <th>Ver</th>
        </tr>
    </thead>
    <tbody>
        @foreach($guest_users as $guest_user)
        <tr>
            <td>{{ $guest_user->id }}</td>
            <td>{{ \App\Guest::getNameGuest($guest_user->id_guest) }}</td>
            <td>{{ \App\User::getName($guest_user->id_user) }}</td>
            <td>
                <a href="{{ url('/admin/guests/users/'.$guest_user->id ) }}" class="btn btn-outline-primary" style="width: 100%">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_guest_questions").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection