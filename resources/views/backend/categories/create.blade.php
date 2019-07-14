@extends('layouts.backend')

@section('title', "Categorias / Alta")
@section('content')
{!! Form::open(['route' => 'admin.categories.store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Nombre Categoria:</label>
        <input type="text" class="form-control" name="name_category" placeholder="Nombre Categoria" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_category" rows="3" required></textarea>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="imagen_category" name="imagen_category" onchange="$('#upload-file-info').val($(this).val());" required>
        <label class="custom-file-label" for="imagen_category">Imagén</label>
    </div>

    <div class="form-group"></div>

    <div class="form-group"><input type="text" class="form-control" id="upload-file-info" placeholder="Nombre Archivo Seleccionado" readonly></div>

    <div class="form-group">
        <label for="active_category">Activo:</label>
        <select class="form-control" name="active_category" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>* Los nombres de las imágenes NO DEBEN TENER ESPACIOS. Se recomienda subir en formato JPG y con un tamaño de 640x480px.</i>
@endsection