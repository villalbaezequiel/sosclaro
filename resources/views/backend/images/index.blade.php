@extends('layouts.backend')

@section('title', "Galería de Imágenes / Imágenes")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/media_images/create') }}">Nueva Imágen</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_popup" width="100%" cellspacing="0">
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
        @foreach($images as $image)

        <tr>
            <td>{{ $image->id }}</td>
            <td>{{ $image->name }}</td>
            <td>{{ \App\ImageCategory::getName($image->id_category) }}</td>
            <td>{{ \App\Functions::getActive($image->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.media_images.destroy', $image->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/media_images/'.$image->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
    $("#list_popup").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection
