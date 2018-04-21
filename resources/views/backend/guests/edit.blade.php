@extends('layouts.backend')

@section('title', "Encuestas / Editar")
@section('content')
{!! Form::open(['route' => ['admin.guests.update', $guest->id], 'method' => 'PUT' ]) !!}
    <div class="form-group">
        <label>Nombre Encuesta:</label>
        <input type="text" class="form-control" name="name_guest" value="{{ $guest->name }}" placeholder="Nombre Encuesta" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_guest" rows="3" required>{{ $guest->description }}</textarea>
    </div>

    <div class="form-group">
        <label>Puntos:</label>
        <input type="number" class="form-control" name="puntos_guest" value="{{ $guest->puntos }}" placeholder="Valor/Puntos de la Encuesta">
    </div>

    <div class="form-group">
        <label for="active_guest">Activo:</label>
        <select class="form-control" name="active_guest" required>
            <option value="1" @if($guest->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($guest->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection