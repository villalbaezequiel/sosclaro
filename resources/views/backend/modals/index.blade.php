@extends('layouts.backend')

@section('title', "Modals")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/modals/create') }}">Nuevo Modal</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_modals" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Url</th>
            <th>Seccion</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($modals as $guest)
        <tr>
            <td>{{ $guest->id }}</td>
            <td>{{ $guest->name }}</td>
            <td>{{ $guest->url }}</td>
            <td>
              @if($guest->section == 1)
                Home 
              @elseif($guest->section == 2)
                Resultados
              @elseif($guest->section == 3)
                Resultados - Mejores Vendedores
              @elseif($guest->section == 4)
                Resultados - Bonus Track
              @elseif($guest->section == 5)
                Resultados - Vendedor Destacado
              @elseif($guest->section == 6)
                Resultados - Mejor Equipo
              @endif
            </td>
            <td>{{ \App\Functions::getActive($guest->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.modals.destroy', $guest->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/modals/'.$guest->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_modals").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection