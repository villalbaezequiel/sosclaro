@extends('layouts.backend')

@section('title', "Pregunta Frecuentes / Editar")
@section('content')
{!! Form::open(['route' => ['admin.preguntas-frecuentes.update' , $pregun_frec->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label> Pregunta: </label>
        <input class="form-control" type="text" name="pregunta" value="{{ $pregun_frec->pregunta }}" required/>
    </div>
    <div class="form-group">
        <label>Respuesta:</label>
        <textarea class="form-control" name="respuesta" required>{{ $pregun_frec->respuesta }}</textarea>
    </div>

    <div class="form-group">
        <label>Activo:</label>
        <select class="form-control" name="active" required>
            <option value="1" @if($pregun_frec->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($pregun_frec->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection