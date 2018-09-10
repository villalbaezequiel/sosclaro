@extends('layouts.backend')

@section('title', "Usuarios / Desempeño (Usuarios Ganadores) / Importar")

@section('message')
  <div class="alert alert-success" style="display: none;">Excel de Desempeño importado con exito!</div>  
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/desempeno/export') }}">Descargar Excel a completar</a>
@endsection

@section('content')
{!! Form::open(['route' => 'admin.desempeno.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'admin-desempeno-store' ]) !!}
    <div class="form-group">
        <label>Asunto:</label>
        <textarea class="form-control" name="desempeno_asunto" rows="2" maxlength="500" required></textarea>
    </div>

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="file_desempeno" name="file_desempeno" onchange="$('#upload-file-info').val($(this).val());" required>
        <label class="custom-file-label" for="file_desempeno">Excel Desempeno</label>
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
          <th scope="col">id</th>
          <th scope="col">id_region</th>
          <th scope="col">dni</th>
          <th scope="col">nombre_apellido</th>
          <th scope="col">puntos</th>
          <th scope="col">indicador_1</th>
          <th scope="col">indicador_2</th>
          <th scope="col">total</th> 
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
<i>*El 'id_region' se puede visualizar en la seccion de <a href="{{ url('/admin/regions') }}">Regiones</a>.</i><br/>
<i>*Los 'dni' se puede visualizar en la seccion de <a href="{{ url('/admin/dni') }}">DNI</a>.</i>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    var form = $("#admin-desempeno-store");
    
    form.submit(function(event){
        
        $(".loading").show();
        var formData = new FormData(form[0]);
        
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '<?= csrf_token() ?>'} });
        $.ajax({
            url: '/admin/desempeno',
            data: formData,
            type: 'POST',
            success: function(data){
              $(".loading").hide();
              if(data.estado !== "undefined" && data.estado == false){ 
                alert("¡Error Técnico! Comuníquese con Soporte! Asegure que esté subiendo correctamente el Excel de Desempeño, con sus datos especificos.");
              } else {
                var preview = data.preview;
                if(preview.length == 0){
                  alert("Asegure que esté subiendo correctamente el Excel de Desempeño, con sus datos especificos.");
                } else {
                // hide form
                form.hide();
                    
                //view preview list
                $("#preview-desempeno").show();
                  //each data
                $.each(preview, function(i,v){
                    $(".content-preview-desempeno").append("<tr><td>"+v.id+"</td>\n\
                      <td>"+v.id_region+"</td>\n\
                      <td>"+v.dni+"</td>\n\
                      <td>"+v.nombre_apellido+"</td>\n\
                      <td>"+v.puntos+"</td>\n\
                      <td>"+v.indicador_1+"</td>\n\
                      <td>"+v.indicador_2+"</td>\n\
                      <td>"+v.total+"</td></tr>");
                });

                $("#submit-preview-import").click(function(event){
                  $(".loading").show();

                  $.get('/admin/desempeno/import/'+JSON.stringify(preview), function(data){
                      $(".loading").hide();
                      if(data.estado !== "undefined" && data.estado == false){
                        alert("¡Error Técnico! Comuníquese con Soporte! Asegure que esté subiendo correctamente el Excel de Desempeño, con sus datos especificos.");
                      } else {
                          if(data.estado == false){
                            alert("Asegure que esté subiendo correctamente el Excel de Desempeño, con sus datos especificos.");
                          } else {
                              form.show();
                              $(".alert.alert-success").show();
                              $("#preview-desempeno").hide();
                              setTimeout(function(){ window.location = "/admin/desempeno"; }, 4000);
                          }
                      }
                    })
                    .done(function() {
                      $(".loading").hide();
                    })
                    .fail(function(response) {
                      $(".loading").hide();
                      alert("¡Error Técnico! Comuníquese con Soporte!");
                    });

                  event.preventDefault();
                });
                
                }
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
