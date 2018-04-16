@extends('layouts.backend')

@section('title', "Configuracion / Legales de Productos / Editar")
@section('content')
{!! Form::open(['route' => ['admin.settings.legal_products.update' , $legal_products->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label>Titulo de Legales de Productos</label>
        <input type="text" class="form-control" name="title_legal_products" value="{{ $legal_products->title }}" placeholder="Titulo Politica y Privacidad" required>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_legal_products" rows="20" required>{{ $legal_products->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection