@extends('layouts.backend')

@section('title', "Usuarios / DNI / Ver")
@section('content')
{!! Form::open(['route' => ['admin.dni.update' , $dni->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label for="name_indicador">DNI</label>
        <input type="text" class="form-control" value="{{ $dni->dni }}" disabled>
    </div>

    <div class="form-group">
        <label for="name_indicador">Nombre y Apellido</label>
        <input type="text" class="form-control" value="{{ $dni->name.' '.$dni->last_name  }}" disabled>
    </div>

    <div class="form-group">
        <label for="name_indicador">Indicador/es</label>
        <input type="text" class="form-control" value="{{ \App\Indicadores::getNameJson($dni->indicador) }}" disabled>
    </div>

    <div class="form-group">
        <label for="name_indicador">Puntos</label>
        <input type="text" class="form-control" value="{{ $dni->puntos }}" disabled>
    </div>

    <div class="form-group">
        <label for="name_indicador">Usuario</label>
        <input type="text" class="form-control" value="@if($dni->id_user == 0)No hay usuario relacionado/registrado @else{{ \App\User::getName($dni->id_user) }}@endif" disabled>
    </div>

    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection