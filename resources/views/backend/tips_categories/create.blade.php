@extends('layouts.backend')

@section('title', "Consejos / Categorias / Alta")
@section('content')
{!! Form::open(['route' => 'admin.tips.categories.store', 'method' => 'POST']) !!}
    <div class="form-group">
        <label>Nombre Categoria de Consejos:</label>
        <input type="text" class="form-control" name="name_tip_category" placeholder="Nombre Categoria" required>
    </div>

    <div class="form-group">
        <label for="active_category">Activo:</label>
        <select class="form-control" name="active_tip_category" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection