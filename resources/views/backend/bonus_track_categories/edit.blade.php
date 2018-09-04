@extends('layouts.backend')

@section('title', "Categorias de Resultados/Desempeños / Editar")
@section('content')
{!! Form::open(['route' => ['admin.bonus_track_categories.update' , $bonus_track_category->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Nombre Categoria:</label>
        <input type="text" class="form-control" name="name_bonus_track_category" placeholder="Nombre Categoria" value="{{ $bonus_track_category->name }}" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_bonus_track_category" rows="3" required>{{ $bonus_track_category->description }}</textarea>
    </div>

    <div class="custom-file">
        <input type="hidden" class="custom-file-input" id="imagen_bonus_track_category_old" name="imagen_bonus_track_category_old" value="{{ $bonus_track_category->image }}">

        <input type="file" class="custom-file-input" id="imagen_bonus_track_category" name="imagen_bonus_track_category">
        <label class="custom-file-label" for="imagen_bonus_track_category">Imagén</label>
    </div>

    <div class="form-group"></div>

    <div class="form-group">
        <label for="active_bonus_track_category">Activo:</label>
        <select class="form-control" name="active_bonus_track_category" required>
            <option value="1" @if($bonus_track_category->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($bonus_track_category->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>* Los nombres de las imágenes NO DEBEN TENER ESPACIOS. Se recomienda subir en formato JPG y con un tamaño de 640x480px.</i>
@endsection