@extends('layouts.backend')

@section('title', "Productos / Editar")
@section('content')
{!! Form::open(['route' => ['admin.products.update' , $product->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Nombre Producto:</label>
        <input type="text" class="form-control" name="name_product" value="{{ $product->name }}" placeholder="Nombre Producto" required>
    </div>

    <div class="form-group">
        <label>Codigo Producto:</label>
        <input type="text" class="form-control" name="codigo_product" value="{{ $product->codigo }}" placeholder="Nombre Producto" required>
    </div>

    <div class="form-group">
        <label>Categoría:</label>
        <select class="form-control" name="id_category" required>
            <option value="">Seleccionar...</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($product->id_category == $category->id) selected="selected" @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_product" rows="3" required>{{ $product->description }}</textarea>
    </div>

    <div class="custom-file">
        <input type="hidden" class="custom-file-input" name="imagen_product_old" value="{{ $product->image }}">
        
        <input type="file" class="custom-file-input" id="imagen_product" name="imagen_product">
        <label class="custom-file-label" for="imagen_product">Imagén</label>
    </div>

    <div class="form-group"></div>

    <div class="form-group">
        <label>Precio:</label>
        <input type="number" class="form-control" name="price_product" value="{{ $product->price }}" required>
    </div>

    <div class="form-group">
        <label>Stock:</label>
        <input type="number" class="form-control" name="stock_product" value="{{ $product->stock }}" required>
    </div>
    
    <div class="form-group">
        <label for="active_product">Activo:</label>
        <select class="form-control" name="active_product" required>
            <option value="1" @if($product->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($product->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection