@extends('layouts.backend')

@section('title', "Usuarios / Codigos Fanbag / Importar Lista")

@section('message')
  <div class="alert alert-success" style="display: none;">Lista de Codigos Fanbag importada con éxito!</div>
@endsection

@section('content')
{!! Form::open(['route' => 'admin.codigos_fanbag.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'admin-codigos_fanbag-store' ]) !!}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="import_codigos" name="import_codigos" onchange="$('#upload-file-info').val($(this).val());" required>
        <label class="custom-file-label" for="import_dni">Listado Codigos Fanbag</label>
    </div>

    <div class="form-group"></div>
    
    <div class="form-group"><input type="text" class="form-control" id="upload-file-info" placeholder="Nombre Archivo Seleccionado" readonly></div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Importar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}

<div id="preview-codigos-fanbag" style="display: none">
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
<i>* Al Importar una nueva lista de códigos, los códigos ya existentes no serán tenidos en cuenta.</i>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    var form = $("#admin-codigos_fanbag-store");
    
    form.submit(function(event){
        
        $(".loading").show();
        var formData = new FormData(form[0]);
        
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '<?= csrf_token() ?>'} });
        $.ajax({
            url: '/admin/codigos_fanbag/store',
            data: formData,
            type: 'POST',
            success: function(data){
              $(".loading").hide();
              if(data.estado !== "undefined" && data.estado == false){ 
                alert("¡Error Técnico! Comuníquese con Soporte! Asegure que esté subiendo correctamente el Excel de Codigos Fanbag, con sus datos especificos.");
              } else {  
                $(".loading").hide();
                
                $(".alert.alert-success").show();
                setTimeout(function(){ window.location = "/admin/codigosFanbag"; }, 4000);

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