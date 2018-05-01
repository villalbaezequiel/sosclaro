@extends('layouts.backend')

@section('title', "Configuracion / Redes Sociales / Alta")
@section('content')
{!! Form::open(['route' => 'admin.settings.social_networks.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <label>Nombre de Red Social:</label>
        <input type="text" class="form-control" name="name_social_networks" placeholder="Nombre de Red Social" required>
    </div>

    <div class="form-group">
        <label>Url:</label>
        <input type="text" class="form-control" name="url_social_networks" placeholder="URL de Red Social" required>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="logo_social_networks" name="logo_social_networks" required>
        <label class="custom-file-label" for="logo_social_networks">Logo</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group">
        <label for="active_social_networks">Activo:</label>
        <select class="form-control" name="active_social_networks" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection