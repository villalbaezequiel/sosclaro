@extends('layouts.backend')

@if(isset($preview))
    @section('title', "Usuarios / Desempeño (Usuarios Ganadores) / Importar / Vista Previa")
@else
    @section('title', "Usuarios / Desempeño (Usuarios Ganadores) / Importar")
@endif

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/desempeno/export') }}">Descargar Excel a completar</a>
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

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Importar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}

@if(isset($preview))
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">id_region</th>
          <th scope="col">dni</th>
          <th scope="col">nombre_apellido</th>
          <th scope="col">puntos</th>
          <th scope="col">indicador_1</th>
          <th scope="col">indicador_2</th>
          <th scope="col">total</th> 
        </tr>
      </thead>
      <tbody>
        @foreach($preview as $value)
        <tr>
          <td>{{ $value['id'] }}</td> 
          <td>{{ $value['id_region'] }}</td> 
          <td>{{ $value['dni'] }}</td> 
          <td>{{ $value['nombre_apellido'] }}</td> 
          <td>{{ $value['puntos'] }}</td> 
          <td>{{ $value['indicador_1'] }}</td> 
          <td>{{ $value['indicador_2'] }}</td> 
          <td>{{ $value['total'] }}</td> 
        </tr>
        @endforeach
      </tbody>
    </table>
                       
    <a href="{{ url('/admin/desempeno/import/'.serialize($preview)) }}" class="btn btn-primary">Importar</a>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>                   
    
    <style>
        form {
            display: none;
        }
    </style>
@endif

@endsection

@section('content-footer')
<i>*El Nombre del Excel no debe tener espacion ni caracteres especiales.</i><br/>
<i>*El 'id_region' se puede visualizar en la seccion de <a href="{{ url('/admin/regions') }}">Regiones</a>.</i><br/>
<i>*Los 'dni' se puede visualizar en la seccion de <a href="{{ url('/admin/dni') }}">DNI</a>.</i>
@endsection
