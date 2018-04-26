@extends('layouts.backend')

@section('title', "Usuarios")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/users/create') }}">Exportar Usuarios</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_users" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Puntos</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ \App\Dni::getPuntos($user->id) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
    $("#list_users").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection