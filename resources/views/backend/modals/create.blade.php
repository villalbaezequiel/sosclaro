@extends('layouts.backend')

@section('title', "Modals / Alta")
@section('content')
{!! Form::open(['route' => 'admin.modals.store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Nombre Modal:</label>
        <input type="text" class="form-control" name="name_modal" placeholder="Nombre Modal" required>
    </div>

    <div class="form-group">
        <label>Url:</label>
        <input type="text" class="form-control" name="url_modal" placeholder="URL Modal" required>
    </div>

    <div class="form-group">
        <label>Seccion:</label>
        <select class="form-control" name="section_modal" required>
            <option value="999">Home</option>
            <option value="666">Resultados</option>
            <option value="1">Resultados - Mejores Vendedores</option>
            <option value="2">Resultados - Vendedor Destacado</option>
            <option value="3">Resultados - Bonus Track</option>
            <option value="4">Resultados - Mejor Equipo</option>
        </select>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="image_desktop_modal" name="image_desktop_modal" onchange="$('#upload-file-info1').val($(this).val());" required>
        <label class="custom-file-label" for="image_desktop_modal">Imagén Desktop</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group"><input type="text" class="form-control" id="upload-file-info1" placeholder="Nombre Archivo Seleccionado" readonly></div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="image_mobile_modal" name="image_mobile_modal" onchange="$('#upload-file-info2').val($(this).val());" required>
        <label class="custom-file-label" for="image_mobile_modal">Imagén Mobile</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group"><input type="text" class="form-control" id="upload-file-info2" placeholder="Nombre Archivo Seleccionado" readonly></div>

    <div class="form-group">
        <label>Activo:</label>
        <select class="form-control" name="active_modal" required>
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