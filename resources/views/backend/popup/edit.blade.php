@extends('layouts.backend')

@section('title', "PopUp / Editar")
@section('content')
{!! Form::open(['route' => ['admin.popup.update' , $popup->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}

    <div class="form-group">
        <label>Nombre PopUp:</label>
        <input type="text" class="form-control" name="name_popup" value="{{ $popup->name }}" placeholder="Nombre PopUp" required>
    </div>

    <div class="form-group">
        <label>Url:</label>
        <input type="text" class="form-control" name="url_popup" value="{{ $popup->url }}" placeholder="URL PopUp">
    </div>

    <div class="form-group">
        <label>Categoría:</label>
        <select class="form-control" name="id_category_popup" required>
            <optgroup label="Resultados">
                @foreach($result_categories as $resultC)
                    <option value="resultC_{{$resultC->id}}" @if($popup->id_category == "resultC_$resultC->id") selected="selected" @endif>{{ $resultC->name }}</option>
                @endforeach
            </optgroup>
            <optgroup label="Bonus Track">
                @foreach($bonus_track_categories as $bonus_trackC)
                    <option value="bonus_trackC_{{$bonus_trackC->id}}" @if($popup->id_category == "bonus_trackC_$bonus_trackC->id") selected="selected" @endif>{{ $bonus_trackC->name }}</option>
                @endforeach
            </optgroup>
        </select>
    </div>

    <div class="form-group">
        <label>Mes</label>
        <select class="form-control" name="month_popup" required>
            @foreach($months as $key => $value)
                <option value="{{ $key }}" @if($popup->month == $key) selected="selected" @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <div class="custom-file">
        <input type="hidden" class="custom-file-input" name="image_popup_old" value="{{ $popup->image }}">
        
        <input type="file" class="custom-file-input" id="image_popup" name="image_popup" onchange="$('#upload-file-info1').val($(this).val());">
        <label class="custom-file-label" for="image_popup">Imagén</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group"><input type="text" class="form-control" id="upload-file-info1" value="{{ $popup->image }}" placeholder="Nombre Archivo Seleccionado" readonly></div>
    
    <div class="form-group">
        <label>Activo:</label>
        <select class="form-control" name="active_popup" required>
            <option value="1" @if($popup->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($popup->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>* La URL a Definir debe tener http:// o https:// al comienzo de la misma.</i>
@endsection