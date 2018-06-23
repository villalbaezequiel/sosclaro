@extends('layouts.backend')

@section('title', "Productos / Alta")
@section('content')
{!! Form::open(['route' => 'admin.products.store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        <label>Nombre Producto:</label>
        <input type="text" class="form-control" name="name_product" placeholder="Nombre Producto" required>
    </div>
    
    <div class="form-group">
        <label>Codigo Producto:</label>
        <input type="text" class="form-control" name="codigo_product" placeholder="Codigo Producto" required>
    </div>

    <div class="form-group">
        <label>Categoría:</label>
        <select class="form-control" name="id_category" required>
            <option value="">Seleccionar...</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Descripción:</label>
        <textarea class="form-control" name="description_product" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label>Politica Legal del Producto:</label>
        <textarea class="form-control" name="politica_legal_product" rows="3" required></textarea>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="imagen_product" name="imagen_product" required>
        <label class="custom-file-label" for="imagen_product">Imagén</label>
    </div>

    <div class="form-group"></div>

    <div class="form-group">
        <label>Precio:</label>
        <input type="number" class="form-control" name="price_product" required>
    </div>

    <div class="form-group">
        <label>Stock:</label>
        <input type="number" class="form-control" name="stock_product" required>
    </div>
    
    <div class="form-group">
        <label for="active_product">Activo:</label>
        <select class="form-control" name="active_product" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>* Los nombres de las imágenes NO DEBEN TENER ESPACIOS. Se recomienda subir en formato JPG y con un tamaño de 640x480px.</i>
@endsection