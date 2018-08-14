@extends('layouts.backend')

@section('title', "Categorias de Resultados / Editar")
@section('content')
{!! Form::open(['route' => ['admin.results_categories.update' , $results_category->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Nombre Categoria:</label>
        <input type="text" class="form-control" name="name_results_category" placeholder="Nombre Categoria" value="{{ $results_category->name }}" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_results_category" rows="3" required>{{ $results_category->description }}</textarea>
    </div>

    <div class="custom-file">
        <input type="hidden" class="custom-file-input" id="imagen_results_category_old" name="imagen_results_category_old" value="{{ $results_category->image }}">

        <input type="file" class="custom-file-input" id="imagen_results_category" name="imagen_results_category">
        <label class="custom-file-label" for="imagen_results_category">Imagén</label>
    </div>

    <div class="form-group"></div>

    <div class="form-group">
        <label for="active_results_category">Activo:</label>
        <select class="form-control" name="active_results_category" required>
            <option value="1" @if($results_category->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($results_category->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>* Los nombres de las imágenes NO DEBEN TENER ESPACIOS. Se recomienda subir en formato JPG y con un tamaño de 640x480px.</i>
@endsection