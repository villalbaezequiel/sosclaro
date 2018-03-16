@extends('layouts.backend')

@section('title', "Roles")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/roles/create') }}">Nuevo Role</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_roles" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Permisos</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>{{ \App\Roles::getPermissions($role->permission) }}</td>
            <td>{{ \App\Functions::getActive($role->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/roles/'.$role->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
    $("#list_roles").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection