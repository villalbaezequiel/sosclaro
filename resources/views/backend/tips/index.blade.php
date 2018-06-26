@extends('layouts.backend')

@section('title', "Novedades")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/tips/create') }}">Nuevo Novedad</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_tips" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tips as $tip)
        <tr>
            <td>{{ $tip->id }}</td>
            <td>{{ $tip->title }}</td>
            <td>{{ \App\TipsCategories::getNameCategory($tip->id_category) }}</td>
            <td>{{ \App\Functions::getActive($tip->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.tips.destroy', $tip->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/tips/'.$tip->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
    $("#list_tips").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection