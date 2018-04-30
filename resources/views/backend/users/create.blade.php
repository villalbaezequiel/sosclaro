@extends('layouts.backend')

@section('title', "Usuarios / Exportar Usuarios")
@section('content')
{!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
    
    <div class="form-group">
        <label for="active_tip">Activos:</label>
        <select class="form-control" name="active_users" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Exportar Usuarios</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection