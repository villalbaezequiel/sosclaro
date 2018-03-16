@extends('layouts.backend')

@section('title', "Roles / Modificar")
@section('content')
{!! Form::open(['route' => ['admin.roles.update', $role->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label for="name_role">Nombre Role</label>
        <input type="text" class="form-control" name="name_role" placeholder="Nombre Role" value="{{ $role->name }}" required>
    </div>
    <div class="form-group">
        <label for="permission_role">Permisos</label>
        <select multiple="multiple" class="form-control" name="permission_role[]" required>
            {{ \App\Roles::getListPermissions($role->permission) }}
        </select>
    </div>
    <div class="form-group">
        <label for="active_role">Activo</label>
        <select class="form-control" name="active_role" required>
            <option value="1" @if($role->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($role->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Modificar</button>
{!! Form::close() !!}
@endsection