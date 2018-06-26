@extends('layouts.backend')

@section('title', "Novedades / Categorias / Editar")
@section('content')
{!! Form::open(['route' => ['admin.tips.categories.update', $tip_category->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label>Nombre Categoria de Novedades:</label>
        <input type="text" class="form-control" name="name_tip_category" value="{{ $tip_category->name }}" placeholder="Nombre Categoria" required>
    </div>

    <div class="form-group">
        <label for="active_category">Activo:</label>
        <select class="form-control" name="active_tip_category" required>
            <option value="1" @if($tip_category->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($tip_category->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection