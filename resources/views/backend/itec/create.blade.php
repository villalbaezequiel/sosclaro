@extends('layouts.backend')

@section('title', "Usuarios / Listado ITEC / Importar Lista ITEC")
@section('content')
{!! Form::open(['route' => 'admin.itec.store', 'method' => 'POST' ]) !!}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="import_itec" name="import_itec" required>
        <label class="custom-file-label" for="import_itec">Listado ITEC</label>
    </div>

    <div class="form-group"></div>

    <button type="submit" class="btn btn-primary">Importar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>* Al Importar una Nueva Lista de números ITEC, si el Numero ITEC ya existe, se renovaran los puntos y indicador. Si un Numero ITEC ya cargado no se encuentra en la Nueva Lista a Importar, se eliminara de la Base de Datos y si a la vez esta relacionada a un Usuario Activo, el mismo se dara de Baja automaticamente.</i>
@endsection