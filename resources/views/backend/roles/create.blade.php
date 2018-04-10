@extends('layouts.backend')

@section('title', "Roles / Alta")
@section('content')
{!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!}
    <div class="form-group">
        <label for="name_role">Nombre Role</label>
        <input type="text" class="form-control" name="name_role" placeholder="Nombre Role" required>
    </div>
    <div class="form-group">
        <label for="permission_role">Permisos</label>
        <select multiple="multiple" class="form-control" name="permission_role[]" required>
            {{ \App\Roles::getListPermissions() }}
        </select>
    </div>
    <div class="form-group">
        <label for="active_role">Activo</label>
        <select class="form-control" name="active_role" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection