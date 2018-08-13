@extends('layouts.backend')

@section('title', "Reportes ")

@section('message')
  <div class="alert alert-success" style="display: none;">Reportes Exportado con Exito!</div>  
@endsection

@section('content')
{!! Form::open(['route' => 'admin.reports.store', 'method' => 'POST', 'id' => 'admin-reports-store' ]) !!}
    <div class="form-group">
        <label for="list_reports">Seleccionar Reporte a Exportar:</label>
        <select class="form-control" name="list_reports">
            <option value="users">Usuarios Registrados</option>
            <option value="perfomances">Desempeño</option>
            <option value="exchanges">Canjes</option>
            <option value="products">Productos</option>
            <option value="guests">Encuestas</option>
            <option value="all_reports" selected>Todos</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Exportar</button>
    <a href="{{ config('app.url') }}/admin/products" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    var form = $("#admin-reports-store");
    
    form.submit(function(event){
        
        $(".loading").show();
        var formData = new FormData(form[0]);
        
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '<?= csrf_token() ?>'} });
        $.ajax({
            url: '/admin/reports',
            data: formData,
            type: 'POST',
            success: function(data){
              $(".loading").hide();
              if(data.estado !== "undefined" && data.estado === false){ 
                alert("¡Error Técnico! Comuníquese con Soporte! Asegure que esté subiendo correctamente el Excel de DNI, con sus datos especificos.");
              } else {
                $(".alert.alert-success").show();
                window.open(data.path,'_blank');
              }
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(response) {
                $(".loading").hide();
                console.log(response);
                alert("¡Error Técnico! Comuníquese con Soporte!");
            }
        });
        
        event.preventDefault();
    });
    
});
</script>
@endsection