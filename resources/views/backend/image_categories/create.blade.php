@extends('layouts.backend')

@section('title', "Galería de Imágenes / Categorias / Alta")
@section('content')
{!! Form::open(['route' => 'admin.media_images_categorias.store', 'method' => 'POST' ]) !!}
    <div class="form-group">
        <label>Nombre Categoria:</label>
        <input type="text" class="form-control" name="name" placeholder="Nombre Categoria" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="active">Activo:</label>
        <select class="form-control" name="active" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection
