@extends('layouts.backend')

@section('title', "Usuarios / Actualizar Puntos/Agencia")
@section('message')
  <div class="alert alert-success" style="display: none;">Excel de Desempeño importado con exito!</div>  
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/users_update/export') }}">Descargar Excel Usuarios Registrados</a>
@endsection

@section('content')
{!! Form::open(['route' => 'admin.users_update.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}    
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="import_dni" name="import_dni" onchange="$('#upload-file-info').val($(this).val());" required>
        <label class="custom-file-label" for="import_dni">Excel</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group"><input type="text" class="form-control" id="upload-file-info" placeholder="Nombre Archivo Seleccionado" readonly></div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Importar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection
@section('content-footer')
<i>*El Nombre del Excel no debe tener espacios ni caracteres especiales.</i><br/>
@endsection