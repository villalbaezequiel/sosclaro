@extends('layouts.backend')

@section('title', "Configuracion / API / Editar")
@section('content')
{!! Form::open(['route' => ['admin.settings.api.update' , $api_version->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label>Titulo API</label>
        <input type="text" class="form-control" name="title_api" value="{{ $api_version->title }}" placeholder="Titulo API" required>
    </div>
    <div class="form-group">
        <label>Version API</label>
        <input type="text" class="form-control" name="version_api" value="{{ $api_version->version }}" placeholder="Verion API" required>
    </div>

    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection