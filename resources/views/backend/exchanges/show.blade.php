@extends('layouts.backend')

@section('title', "Canjes / Ver")
@section('content')
{!! Form::open() !!}
    
    <div class="form-group">
        <label for="name_indicador">Usuario DNI</label>
        <input type="text" class="form-control" value="{{ \App\Dni::getDni($exchange->id_user) }}" disabled>
    </div>
    
    <div class="form-group">
        <label for="name_indicador">Usuario</label>
        <input type="text" class="form-control" value="{{ \App\Dni::getName($exchange->id_user) }}" disabled>
    </div>
    
    <div class="form-group">
        <label for="name_indicador">Codigo de Producto</label>
        <input type="text" class="form-control" value="{{ \App\Products::getCodigo($exchange->id_product) }}" disabled>
    </div>
    
    <div class="form-group">
        <label for="name_indicador">Nombre Producto</label>
        <input type="text" class="form-control" value="{{ \App\Products::getName($exchange->id_product) }}" disabled>
    </div>

    <div class="form-group">
        <label>Estado</label>
        <select class="form-control" disabled>
            <option value="1" @if($exchange->status == 0) selected="selected" @endif>Pendiente</option>
            <option value="1" @if($exchange->status == 1) selected="selected" @endif>En Transito (Envío realizado)</option>
            <option value="1" @if($exchange->status == 2) selected="selected" @endif>Completo (Recepción confirmada)</option>
        </select>
    </div>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Volver</a>
{!! Form::close() !!}
@endsection