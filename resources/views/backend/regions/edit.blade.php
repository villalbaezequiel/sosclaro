@extends('layouts.backend')

@section('title', "Regiones / Editar")
@section('content')
{!! Form::open(['route' => ['admin.regions.update', $region->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label for="name_region">Nombre Region</label>
        <input type="text" class="form-control" name="name_region" value="{{ $region->name }}" placeholder="Nombre Region" required>
    </div>

    <div class="form-group">
        <label for="active_region">Activo</label>
        <select class="form-control" name="active_region" required>
            <option value="1" @if($region->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($region->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection