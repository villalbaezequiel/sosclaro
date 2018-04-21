@extends('layouts.backend')

@section('title', "Encuestas / Alta")
@section('content')
{!! Form::open(['route' => 'admin.guests.store', 'method' => 'POST' ]) !!}
    <div class="form-group">
        <label>Nombre Encuesta:</label>
        <input type="text" class="form-control" name="name_guest" placeholder="Nombre Encuesta" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_guest" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label>Puntos:</label>
        <input type="number" class="form-control" name="puntos_guest" placeholder="Valor/Puntos de la Encuesta">
    </div>

    <div class="form-group">
        <label for="active_guest">Activo:</label>
        <select class="form-control" name="active_guest" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection