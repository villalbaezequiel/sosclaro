@extends('layouts.backend')

@if(isset($preview))
    @section('title', "Usuarios / Listado DNI / Importar Lista DNI / Vista Previa")
@else
    @section('title', "Usuarios / Listado DNI / Importar Lista DNI")
@endif

@section('content')
{!! Form::open(['route' => 'admin.dni.store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="import_dni" name="import_dni" required>
        <label class="custom-file-label" for="import_dni">Listado DNI</label>
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
          <th scope="col">id_region</th>
          <th scope="col">dni</th>
          <th scope="col">nombres</th>
          <th scope="col">apellidos</th>
          <th scope="col">agente</th>
          <th scope="col">direccion</th>
          <th scope="col">cp</th>
          <th scope="col">localidad</th> 
          <th scope="col">provincia</th> 
          <th scope="col">fecha_ingreso</th> 
          <th scope="col">tipo_usuario</th> 
        </tr>
      </thead>
      <tbody>
        @foreach($preview as $value)
        <tr> 
          <td>{{ $value['id_region'] }}</td> 
          <td>{{ $value['dni'] }}</td> 
          <td>{{ $value['nombres'] }}</td> 
          <td>{{ $value['apellidos'] }}</td> 
          <td>{{ $value['agente'] }}</td> 
          <td>{{ $value['direccion'] }}</td> 
          <td>{{ $value['cp'] }}</td> 
          <td>{{ $value['localidad'] }}</td> 
          <td>{{ $value['provincia'] }}</td> 
          <td>{{ \App\Functions::getDate($value['fecha_ingreso']) }}</td> 
          <td>{{ $value['tipo_usuario'] }}</td> 
        </tr>
        @endforeach
      </tbody>
    </table>
                       
    <a href="{{ url('/admin/dni/import/'.serialize($preview)) }}" class="btn btn-primary">Importar</a>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>                   
    
    <style>
        form {
            display: none;
        }
    </style>
@endif

@endsection

@section('content-footer')
<i>* Al Importar una Nueva Lista de números DNI, si el Numero DNI ya existe, se renovaran los puntos y indicador.</i>
@endsection