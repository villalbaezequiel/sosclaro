@extends('layouts.backend')

@section('title', "Ubicaciones / Ciudad / Editar")
@section('content')
{!! Form::open(['route' => ['admin.locations.update' , $city->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label for="name_city">Nombre Ciudad</label>
        <input type="text" class="form-control" name="name_city" value="{{ $city->name }}" placeholder="Nombre Ciudad" required>
    </div>
    <div class="form-group">
        <label for="province_city">Provincia</label>
        <select class="form-control" name="province_city" required>
            <option value="">Seleccionar...</option>
            @foreach($provinces as $province)
            <option value="{{ $province->id }}" @if($city->id_province == $province->id) selected="selected" @endif >{{ $province->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="active_city">Activo</label>
        <select class="form-control" name="active_city" required>
            <option value="1" @if($city->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($city->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
{!! Form::close() !!}
@endsection