@extends('layouts.backend')

@section('title', "Canjes / Editar")
@section('content')
{!! Form::open(['route' => ['admin.exchanges.update' , $exchange->id], 'method' => 'PUT']) !!}
    
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
        <select class="form-control" name="exchange_status" required>
            <option value="1" @if($exchange->status == 0) selected="selected" @endif>Envio Pendiente</option>
            <option value="1" @if($exchange->status == 1) selected="selected" @endif>En Transito (Envío realizado)</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button> 
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection