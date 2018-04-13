@extends('layouts.backend')

@section('title', "Consejos / Categorias")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/tips/categories/create') }}">Nueva Categoría</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_categories" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Entradas Asociados</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tips_categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ \App\TipsCategories::countProducts($category->id) }}</td>
            <td>{{ \App\Functions::getActive($category->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.tips.categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/tips/categories/'.$category->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
    $("#list_categories").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection