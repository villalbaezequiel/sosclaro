@extends('layouts.backend')

@section('title', "Pregunta Frecuentes / Alta")
@section('content')
{!! Form::open(['route' => 'admin.preguntas-frecuentes.store', 'method' => 'POST' ]) !!}
    <div class="form-group">
        <label> Pregunta: </label>
        <input class="form-control" type="text" name="pregunta" required />
    </div>
    <div class="form-group">
        <label>Respuesta:</label>
        <textarea class="form-control" name="respuesta" required></textarea>
    </div>

    <div class="form-group">
        <label>Activo:</label>
        <select class="form-control" name="active" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection