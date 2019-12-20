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
<a class="btn btn-primary mb-3" href="{{ url('/admin/users/update_users') }}">Importar Usuarios Activos</a>
@endsection



@section('content')
<table class="table table-bordered" id="list_users" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#ID</th>
            <th>#DNI</th>
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
                <td>{{ $user->id }}</td>
                <td>{{ \App\Dni::getDni($user->id) }}</td>
                <td>{{ \App\Dni::getName($user->id) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ \App\Dni::getPuntos($user->id) }}</td>
                <td>{{ \App\Functions::getActive($user->active) }}</td>
                <td>
                @if(\App\Dni::getDni($user->id))
                        <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
                        <input type="hidden" name="id_user_profile" value="{{  \App\UsersProfile::getIdUser($user->id) }}">
                @else
                    <span>No disponible</span>
                @endif
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
