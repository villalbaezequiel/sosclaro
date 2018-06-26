@extends('layouts.backend')

@section('title', "Novedades / Editar")
@section('content')
{!! Form::open(['route' => ['admin.tips.update', $tip->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Titulo Novedad:</label>
        <input type="text" class="form-control" name="title_tip" placeholder="Nombre Novedad" required value="{{ $tip->title }}">
    </div>

    <div class="form-group">
        <label>Categoría:</label>
        <select class="form-control" name="id_category" required>
            <option value="">Seleccionar...</option>
            @foreach($tips_categories as $category)
            <option value="{{ $category->id }}" @if($tip->id_category == $category->id) selected="selected" @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>URL Youtube:</label>
        <input type="text" class="form-control" name="url_youtube_tip" placeholder="URL Youtube" value="{{ $tip->url_youtube }}">
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_tip" rows="5" required>{{ $tip->description }}</textarea>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="imagen_tip" name="imagen_tip">
        <input type="hidden" name="imagen_tip_old" value="{{ $tip->image }}">
        <label class="custom-file-label" for="imagen_tip">Imagén</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group">
        <label for="active_tip">Activo:</label>
        <select class="form-control" name="active_tip" required>
            <option value="1" @if($tip->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($tip->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection