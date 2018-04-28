@extends('layouts.backend')

@section('title', "Productos")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/products/create') }}">Nuevo Producto</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_products" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->codigo }}</td>
            <td>{{ \App\Categories::getNameCategory($product->id_category) }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ \App\Functions::getActive($product->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.products.destroy', $product->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
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
    $("#list_products").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection