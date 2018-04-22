@extends('layouts.backend')

@section('title', "Usuarios / Indicadores / Alta")
@section('content')
{!! Form::open(['route' => 'admin.indicadores.store', 'method' => 'POST']) !!}
    <div class="form-group">
        <label for="name_indicador">Nombre Indicador</label>
        <input type="text" class="form-control" name="name_indicador" placeholder="Nombre Indicador" required>
    </div>

    <div class="form-group">
        <label for="active_indicador">Activo</label>
        <select class="form-control" name="active_indicador" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection