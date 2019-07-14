@extends('layouts.backend')

@section('title', "Usuarios / Fix Bugs Duplicate")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('content')

  {!! Form::open(['route' => 'admin.dni_fix_duplicates.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="custom-file">
          <input type="file" class="custom-file-input" id="dni" name="dni" onchange="$('#upload-file-info').val($(this).val());" required>
          <label class="custom-file-label" for="dni">Listado Usuarios Tabla DNI (id,name,last_name)</label>
      </div>

      <div class="form-group"></div>

      <div class="form-group"><input type="text" class="form-control" id="upload-file-info" placeholder="Nombre Archivo Seleccionado" readonly></div>

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-primary">Update Fix</button>
      <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
  {!! Form::close() !!}

@endsection
