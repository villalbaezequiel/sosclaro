@extends('layouts.backend')

@section('title', "Regiones / Alta")
@section('content')
{!! Form::open(['route' => 'admin.regions.store', 'method' => 'POST']) !!}
    <div class="form-group">
        <label for="name_region">Nombre Region</label>
        <input type="text" class="form-control" name="name_region" placeholder="Nombre Region" required>
    </div>

    <div class="form-group">
        <label for="active_region">Activo</label>
        <select class="form-control" name="active_region" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection