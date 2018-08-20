@extends('layouts.backend')

@section('title', "Modals / Editar")
@section('content')
{!! Form::open(['route' => ['admin.modals.update' , $modal->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}

    <div class="form-group">
        <label>Nombre Modal:</label>
        <input type="text" class="form-control" name="name_modal" value="{{ $modal->name }}" placeholder="Nombre Modal" required>
    </div>

    <div class="form-group">
        <label>Url:</label>
        <input type="text" class="form-control" name="url_modal" value="{{ $modal->url }}" placeholder="URL Modal" required>
    </div>

    <div class="form-group">
        <label>Seccion:</label>
        <select class="form-control" name="section_modal" required>
            <option value="999" @if($modal->section == 999) selected="selected" @endif>Home</option>
            <option value="666" @if($modal->section == 666) selected="selected" @endif>Resultados</option>
            <option value="1" @if($modal->section == 1) selected="selected" @endif>Resultados - Mejores Vendedores</option>
            <option value="2" @if($modal->section == 2) selected="selected" @endif>Resultados - Bonus Track</option>
            <option value="3" @if($modal->section == 3) selected="selected" @endif>Resultados - Vendedor Destacado</option>
            <option value="4" @if($modal->section == 4) selected="selected" @endif>Resultados - Mejor Equipo</option>
        </select>
    </div>

    <div class="custom-file">
        <input type="hidden" class="custom-file-input" name="image_desktop_modal_old" value="{{ $modal->image_desktop }}">
        
        <input type="file" class="custom-file-input" id="image_desktop_modal" name="image_desktop_modal">
        <label class="custom-file-label" for="image_desktop_modal">Imagén Desktop</label>
    </div>

    <div class="form-group"></div>

    <div class="custom-file">
        <input type="hidden" class="custom-file-input" name="image_mobile_modal_old" value="{{ $modal->image_mobile }}">
        
        <input type="file" class="custom-file-input" id="image_mobile_modal" name="image_mobile_modal">
        <label class="custom-file-label" for="image_mobile_modal">Imagén Mobile</label>
    </div>

    <div class="form-group"></div>

    <div class="form-group">
        <label>Activo:</label>
        <select class="form-control" name="active_modal" required>
            <option value="1" @if($modal->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($modal->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>* La URL a Definir debe tener http:// o https:// al comienzo de la misma.</i>
@endsection