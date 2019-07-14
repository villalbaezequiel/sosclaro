@extends('layouts.backend')

@section('title', "Resultados Fijos / Importar")

@section('message')
  <div class="alert alert-success" style="display: none;">Resultados Fijos Importado con exito!</div>  
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/results/export') }}" target="_blank">Descargar Excel a completar</a>
@endsection

@section('content')
{!! Form::open(['route' => 'admin.results.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'admin-results-store' ]) !!}
    <div class="form-group">
        <label>Categorias</label>
        <select class="form-control" name="category_results" required>
            @foreach($categories_results as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Asunto</label>
        <textarea class="form-control" name="asunto" ></textarea>
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
        <label class="custom-file-label" for="file_results">Excel Resultados Fijos</label>
    </div>

    <div class="form-group"></div>
    
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="image_owner" name="image_owner" onchange="$('#upload-file-info').val($(this).val());">
        <label class="custom-file-label" for="image_owner">Imagén Destacada/Ganador</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group"><input type="text" class="form-control" id="upload-file-info" placeholder="Nombre Archivo Seleccionado" readonly></div>
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Importar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}

<div id="preview-desempeno" style="display: none">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">id_user</th>
          <th scope="col">id_region</th>
          <th scope="col">id_categoria</th>
          <th scope="col">dni</th>
          <th scope="col">nombre_apellido</th>
          <th scope="col">asunto</th>
          <th scope="col">mes</th>
          <th scope="col">puntos</th>
          <th scope="col">desempeño</th>
          <th scope="col">puesto</th> 
        </tr>
      </thead>
      <tbody class="content-preview-desempeno">
      </tbody>
    </table>
                       
    <a href="javascript:void(0)" id="submit-preview-import" class="btn btn-primary">Importar</a>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>                   
</div>

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
                alert("¡Error Técnico! Comuníquese con Soporte! Asegure que esté subiendo correctamente el Excel de Resultados/Desempeño, con sus datos especificos.");
              } else {
                $(".loading").hide();
                
                $(".alert.alert-success").show();
                setTimeout(function(){ window.location = "/admin/results"; }, 4000);
                
//                var preview = data.preview;
//                if(preview.length == 0){
//                  alert("Asegure que esté subiendo correctamente el Excel de Resultados/Desempeño, con sus datos especificos.");
//                } else {
//                    
//                // hide form
//                form.hide();
//                    
//                //view preview list
//                $("#preview-desempeno").show();
//                  //each data
//                $.each(preview, function(i,v){
//                    $(".content-preview-desempeno").append("<tr><td>"+v.id_user+"</td>\n\
//                      <td>"+v.id_region+"</td>\n\
//                      <td>"+v.id_category+"</td>\n\
//                      <td>"+v.dni+"</td>\n\
//                      <td>"+v.nombre_apellido+"</td>\n\
//                      <td>"+v.asunto+"</td>\n\
//                      <td>"+v.month+"</td>\n\
//                      <td>"+v.puntos+"</td>\n\
//                      <td>"+v.desempeno+"</td>\n\
//                      <td>"+v.puesto+"</td></tr>");
//                });
//
//                $("#submit-preview-import").click(function(event){
//                  $(".loading").show();
//
//                  $.get('/admin/results/import/'+JSON.stringify(preview), function(data){
//                      $(".loading").hide();
//                      if(data.estado !== "undefined" && data.estado == false){
//                        alert("¡Error Técnico! Comuníquese con Soporte! Asegure que esté subiendo correctamente el Excel de Resultados/Desempeño, con sus datos especificos.");
//                      } else {
//                          if(data.estado == false){
//                            alert("Asegure que esté subiendo correctamente el Excel de Resultados/Desempeño, con sus datos especificos.");
//                          } else {
//                              form.show();
//                              $(".alert.alert-success").show();
//                              $("#preview-desempeno").hide();
//                              setTimeout(function(){ window.location = "/admin/results"; }, 4000);
//                          }
//                      }
//                    })
//                    .done(function() {
//                      $(".loading").hide();
//                    })
//                    .fail(function(response) {
//                      $(".loading").hide();
//                      alert("¡Error Técnico! Comuníquese con Soporte!");
//                    });
//
//                  event.preventDefault();
//                });
//                
//                }
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
