@extends('layouts.backend')

@section('title', "Resultados / Importar")

@section('message')
  <div class="alert alert-success" style="display: none;">Resultados Importado con exito!</div>  
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/results/export') }}" target="_blank">Descargar Excel a completar</a>
@endsection

@section('content')
{!! Form::open(['route' => 'admin.results.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'admin-results-store' ]) !!}
    <div class="form-group">
        <label>Categorias de Resultados</label>
        <select class="form-control" name="category_results" required>
            @foreach($categories_results as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label>Mes</label>
        <select class="form-control" name="month_results" required>
            @foreach($months as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="file_results" name="file_results" required>
        <label class="custom-file-label" for="file_results">Excel Resultados</label>
    </div>

    <div class="form-group"></div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Importar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>*El Nombre del Excel no debe tener espacion ni caracteres especiales.</i><br/>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    var form = $("#admin-results-store");
    
    form.submit(function(event){
        
        $(".loading").show();
        var formData = new FormData(form[0]);
        
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '<?= csrf_token() ?>'} });
        $.ajax({
            url: '/admin/results',
            data: formData,
            type: 'POST',
            success: function(data){
              $(".loading").hide();
              if(data.estado !== "undefined" && data.estado === false){ 
                alert("¡Error Técnico! Comuníquese con Soporte! Asegure que esté subiendo correctamente el Excel de Resultados, con sus datos especificos.");
              } else {
                $(".alert.alert-success").show();
                setTimeout(function(){ window.location = "/admin/results"; }, 4000);
              }
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(response) {
                $(".loading").hide();
                alert("¡Error Técnico! Comuníquese con Soporte!");
            }
        });
        
        event.preventDefault();
    });
    
});
</script>
@endsection
