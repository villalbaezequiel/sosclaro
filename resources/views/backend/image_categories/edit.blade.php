@extends('layouts.backend')

@section('title', "Galería de Imágenes / Categorias / Editar")
@section('content')
{!! Form::open(['route' => ['admin.media_images_categorias.update' , $image_category->id], 'method' => 'PUT' ]) !!}
    <div class="form-group">
        <label>Nombre Categoria:</label>
        <input type="text" class="form-control" name="name" placeholder="Nombre Categoria" value="{{ $image_category->name }}" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description" rows="3">{{ $image_category->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="active">Activo:</label>
        <select class="form-control" name="active" required>
            <option value="1" @if($image_category->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($image_category->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection
