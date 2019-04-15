@extends('layouts.backend')

@section('title', "Galería de Imágenes / Imágenes / Alta")
@section('content')
{!! Form::open(['route' => 'admin.media_images.store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Nombre:</label>
        <input type="text" class="form-control" name="name" placeholder="Nombre Imagen" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label>Url:</label>
        <input type="text" class="form-control" name="link" placeholder="URL Imagen">
    </div>

    <div class="form-group">
        <label>Categorias:</label>
        <select class="form-control" name="id_category" required>
            <option value="">Seleccionar</option>
          @foreach($image_categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="image" name="image" onchange="$('#upload-file-info1').val($(this).val());" required>
        <label class="custom-file-label" for="image">Imagén</label>
    </div>

    <div class="form-group"></div>

    <div class="form-group"><input type="text" class="form-control" id="upload-file-info1" placeholder="Nombre Archivo Seleccionado" readonly></div>

    <div class="form-group">
        <label>Activo:</label>
        <select class="form-control" name="active" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>* La URL a Definir debe tener http:// o https:// al comienzo de la misma.</i>
@endsection
