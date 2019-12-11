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

    <div class="form-group">
        <label>Politica Legal del Producto:</label>
        <textarea class="form-control" name="politica_legal_product" rows="3" required>{{ $product->politica_legal }}</textarea>
    </div>

    <label>Multimedia <a href="#card-footer-info">(*1)</a>:</label>
    <div class="custom-file">
        <input type="hidden" class="custom-file-input" name="imagen_product_old" value="{{ $product->image }}">
        
        <input type="file" class="custom-file-input" id="imagen_product" name="imagen_product" onchange="$('#upload-file-info').val($(this).val());">
        <label class="custom-file-label" for="imagen_product">Imagén</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group"><input type="text" class="form-control" id="upload-file-info" value="{{ $product->image }}" placeholder="Nombre Archivo Seleccionado" readonly></div>

    <div class="form-group">
        <label>Precio:</label>
        <input type="number" class="form-control" name="price_product" value="{{ $product->price }}" required>
    </div>

    <!-- HISTORY STOCK INITIAL PRODUCT -->
    <div class="form-group">
        <label>Historial "STOCK INICIAL":</label>
      <center>  
        <div class="table-responsive col-8">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                      <th>Stock</th>
                      <th>Fecha de Creación</th>
                      <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                  @if($stocks_initial)  
                    @foreach($stocks_initial as $stock)
                      <tr>
                        <td>{{ $stock->stock }}</td>
                        <td>{{ \App\Functions::getDate($stock->created_at) }}</td>
                        <td> - </td>
                      </tr>
                    @endforeach
                  @endif
                  <tr>
                      <td> - </td>
                      <td> - </td>
                      <td><strong style="color: red">{{ $stocks_total }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </center>
      
      <label>Nuevo Stock Inicial:</label>
      <input type="number" class="form-control" name="stock_initial_product">
    </div>
    
    <div class="form-group">
        <label>Stock:</label>
        <input type="number" class="form-control" name="stock_product" value="{{ $product->stock }}" readonly>
    </div>
    
    <div class="form-group">
        <label>Notificar por Mail, cuando el STOCK del Producto, este igual a:</label>
        <input type="number" class="form-control" name="stock_notification_product" value="{{ $product->notification }}" required>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="voucher_product" id="voucher_product">
            <label class="custom-label" for="voucher_product">¿Es voucher de Mercado Libre o Netshoes?</label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="is_fanbag" id="is_fanbag">
            <label class="custom-label" for="is_fanbag">¿Es código Fanbag?</label>
        </div>
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

@section('content-footer')
<i>1) Los nombres de las imágenes NO DEBEN TENER ESPACIOS. Se recomienda subir en formato JPG y con un tamaño de 640x480px.</i>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#voucher_product').on("click", function() {
                $('#is_fanbag').prop("checked", false);
            });

            $('#is_fanbag').on("click", function() {
                $('#voucher_product').prop("checked", false);
            });

        });
    </script>
@endsection