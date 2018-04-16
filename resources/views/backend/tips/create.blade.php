@extends('layouts.backend')

@section('title', "Consejos / Alta")
@section('content')
{!! Form::open(['route' => 'admin.tips.store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Titulo Consejo:</label>
        <input type="text" class="form-control" name="title_tip" placeholder="Nombre Consejo" required>
    </div>

    <div class="form-group">
        <label>Categoría:</label>
        <select class="form-control" name="id_category" required>
            <option value="">Seleccionar...</option>
            @foreach($tips_categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>URL Youtube:</label>
        <input type="text" class="form-control" name="url_youtube_tip" placeholder="URL Youtube">
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_tip" rows="5" required></textarea>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="imagen_tip" name="imagen_tip[]" multiple="multiple">
        <label class="custom-file-label" for="imagen_tip">Imagén</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group">
        <label for="active_tip">Activo:</label>
        <select class="form-control" name="active_tip" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection