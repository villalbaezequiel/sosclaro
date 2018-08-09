@extends('layouts.backend')

@section('title', "Usuarios / Listado DNI / Importar Lista DNI")

@section('message')
  <div class="alert alert-success" style="display: none;">Lista de DNI Importada con exito!</div>  
@endsection

@section('content')
{!! Form::open(['route' => 'admin.dni.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'admin-dni-store' ]) !!}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="import_dni" name="import_dni" required>
        <label class="custom-file-label" for="import_dni">Listado DNI</label>
    </div>

    <div class="form-group"></div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Importar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}

<div id="preview-dni" style="display: none">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">id_region</th>
          <th scope="col">dni</th>
          <th scope="col">nombres</th>
          <th scope="col">apellidos</th>
          <th scope="col">agente</th>
          <th scope="col">direccion</th>
          <th scope="col">cp</th>
          <th scope="col">localidad</th> 
          <th scope="col">provincia</th> 
          <th scope="col">fecha_ingreso</th> 
          <th scope="col">tipo_usuario</th> 
        </tr>
      </thead>
      <tbody class="content-preview-dni">
      </tbody>
    </table>
                       
    <a href="javascript:void(0)" id="submit-preview-import" class="btn btn-primary">Importar</a>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>                   
</div>
@endsection

@section('content-footer')
<i>* Al Importar una Nueva Lista de números DNI, si el Numero DNI ya existe, se renovaran los puntos y indicador.</i>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    var form = $("#admin-dni-store");
    
    form.submit(function(event){
        
        $(".loading").show();
        var formData = new FormData(form[0]);
        
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '<?= csrf_token() ?>'} });
        $.ajax({
            url: '/admin/dni',
            data: formData,
            type: 'POST',
            success: function(data){
              $(".loading").hide();
              if(data.estado !== "undefined" && data.estado == false){ 
                alert("¡Error Técnico! Comuníquese con Soporte! Asegure que esté subiendo correctamente el Excel de DNI, con sus datos especificos.");
              } else {
                var preview = data.preview;
                if(preview.length == 0){
                  alert("Asegure que esté subiendo correctamente el Excel de DNI, con sus datos especificos.");
                } else {
                // hide form
                form.hide();
                    
                //view preview list
                $("#preview-dni").show();
                //each data
                $.each(preview, function(i,v){
                    $(".content-preview-dni").append("<tr><td>"+v.id_region+"</td>\n\
                      <td>"+v.dni+"</td>\n\
                      <td>"+v.nombres+"</td>\n\
                      <td>"+v.apellidos+"</td>\n\
                      <td>"+v.agente+"</td>\n\
                      <td>"+v.direccion+"</td>\n\
                      <td>"+v.cp+"</td>\n\
                      <td>"+v.localidad+"</td>\n\
                      <td>"+v.provincia+"</td>\n\
                      <td>"+v.fecha_ingreso+"</td>\n\
                      <td>"+v.tipo_usuario+"</td></tr>");
                });

                $("#submit-preview-import").click(function(event){
                  $(".loading").show();

                  $.get('/admin/dni/import/'+JSON.stringify(preview), function(data){
                      $(".loading").hide();
                      if(data.estado !== "undefined" && data.estado == false){
                        alert("¡Error Técnico! Comuníquese con Soporte! Asegure que esté subiendo correctamente el Excel de DNI, con sus datos especificos.");
                      } else {
                          if(data.estado == false){
                            alert("Asegure que esté subiendo correctamente el Excel de DNI, con sus datos especificos.");
                          } else {
                              form.show();
                              $(".alert.alert-success").show();
                              $("#preview-dni").hide();
                              setTimeout(function(){ window.location = "/admin/dni"; }, 4000);
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