@extends('layouts.backend')

@section('title', "Configuracion / Politica y Privacidad / Editar")
@section('content')
{!! Form::open(['route' => ['admin.settings.politics_privacy.update' , $politics_privacy->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label>Titulo Politica y Privacidad</label>
        <input type="text" class="form-control" name="title_politics_privacy" value="{{ $politics_privacy->title }}" placeholder="Titulo Politica y Privacidad" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_politics_privacy" rows="20" required>{{ $politics_privacy->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection