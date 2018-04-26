@extends('layouts.backend')

@section('title', "Usuarios / Listado DNI / Importar Lista DNI")
@section('content')
{!! Form::open(['route' => 'admin.dni.store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="import_dni" name="import_dni" required>
        <label class="custom-file-label" for="import_dni">Listado DNI</label>
    </div>

    <div class="form-group"></div>

    <button type="submit" class="btn btn-primary">Importar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>* Al Importar una Nueva Lista de números DNI, si el Numero DNI ya existe, se renovaran los puntos y indicador. Si un Numero DNI ya cargado no se encuentra en la Nueva Lista a Importar, se eliminara de la Base de Datos y si a la vez esta relacionada a un Usuario Activo, el mismo se dara de Baja automaticamente.</i>
@endsection