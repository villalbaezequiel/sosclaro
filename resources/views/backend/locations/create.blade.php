@extends('layouts.backend')

@section('title', "Ubicaciones / Ciudad / Alta")
@section('content')
{!! Form::open(['route' => 'admin.locations.store', 'method' => 'POST']) !!}
    <div class="form-group">
        <label for="name_city">Nombre Ciudad</label>
        <input type="text" class="form-control" name="name_city" placeholder="Nombre Ciudad" required>
    </div>
    <div class="form-group">
        <label for="province_city">Provincia</label>
        <select class="form-control" name="province_city" required>
            <option value="">Seleccionar...</option>
            @foreach($provinces as $province)
            <option value="{{ $province->id }}" >{{ $province->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="active_city">Activo</label>
        <select class="form-control" name="active_city" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection