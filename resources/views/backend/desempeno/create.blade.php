@extends('layouts.backend')

@section('title', "Usuarios / Desempeño (Usuarios Ganadores) / Importar")

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ asset('assets/backend/docs/ejemplo_desempeno.xlsx') }}">Descargar Ejemplo Excel</a>
@endsection

@section('content')
{!! Form::open(['route' => 'admin.desempeno.store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Asunto:</label>
        <textarea class="form-control" name="desempeno_asunto" rows="2" maxlength="500" required></textarea>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="file_desempeno" name="file_desempeno" required>
        <label class="custom-file-label" for="file_desempeno">Excel Desempeno</label>
    </div>

    <div class="form-group"></div>

    <button type="submit" class="btn btn-primary">Importar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>*El Nombre del Excel no debe tener espacion ni caracteres especiales.</i><br/>
<i>*El 'id_region' se puede visualizar en la seccion de <a href="{{ url('/admin/regions') }}">Regiones</a>.</i><br/>
<i>*Los 'dni' se puede visualizar en la seccion de <a href="{{ url('/admin/dni') }}">DNI</a>.</i>
@endsection