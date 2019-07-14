@extends('layouts.backend')

@section('title', "Pregunta Frecuentes")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/preguntas-frecuentes/create') }}">Nueva Pregunta Frecuente</a>
@endsection

@section('content')
@section('content')
<table class="table table-bordered" id="list_preg_frec" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Pregunta</th>
            <th>Respuesta</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($preguntas as $pregun_frec)
        <tr>
            <td>{{ $pregun_frec->id }}</td>
            <td>{{ $pregun_frec->pregunta }}</td>
            <td>{{ $pregun_frec->respuesta }}</td>
            <td>{{ \App\Functions::getActive($pregun_frec->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.preguntas-frecuentes.destroy', $pregun_frec->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/preguntas-frecuentes/'.$pregun_frec->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
    $("#list_preg_frec").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection