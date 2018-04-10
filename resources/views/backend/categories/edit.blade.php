@extends('layouts.backend')

@section('title', "Categorias / Editar")
@section('content')
{!! Form::open(['route' => ['admin.categories.update' , $category->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Nombre Categoria:</label>
        <input type="text" class="form-control" name="name_category" placeholder="Nombre Categoria" value="{{ $category->name }}" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_category" rows="3" required>{{ $category->description }}</textarea>
    </div>

    <div class="custom-file">
        <input type="hidden" class="custom-file-input" id="imagen_category_old" name="imagen_category_old" value="{{ $category->image }}">

        <input type="file" class="custom-file-input" id="imagen_category" name="imagen_category">
        <label class="custom-file-label" for="imagen_category">Imagén</label>
    </div>

    <div class="form-group"></div>

    <div class="form-group">
        <label for="active_category">Activo:</label>
        <select class="form-control" name="active_category" required>
            <option value="1" @if($category->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($category->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection