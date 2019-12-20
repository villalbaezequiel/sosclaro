@extends('layouts.backend')

@section('title', "Usuarios / Update Activos / Importar Lista")

@section('message')
    <div class="alert alert-success" style="display: none;">Lista de Usuarios activos importada con éxito!</div>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.users_update.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'admin-users_update-store' ]) !!}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="import_users_active" name="import_users_active" onchange="$('#upload-file-info').val($(this).val());" required>
        <label class="custom-file-label" for="import_users_active">Listado de Usuarios Activos</label>
    </div>

    <div class="form-group"></div>

    <div class="form-group"><input type="text" class="form-control" id="upload-file-info" placeholder="Nombre Archivo Seleccionado" readonly></div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Importar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
    {!! Form::close() !!}

    <div id="preview-users-update" style="display: none">
        <table class="table table-bordered" id="list_users" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>#ID</th>
                <th>#DNI</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Puntos</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <a href="javascript:void(0)" id="submit-preview-import" class="btn btn-primary">Importar</a>
        <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
    </div>
@endsection

@section('content-footer')
    <i>* Esta importación no crea usuarios nuevos. Solo actualiza usuarios activos/inactivos. Al volver a poner a un usuario como Activo, mantendra todos sus puntos.</i>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            var form = $("#admin-users_update-store");

            form.submit(function(event){

                $(".loading").show();
                var formData = new FormData(form[0]);

                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '<?= csrf_token() ?>'} });
                $.ajax({
                    url: '/admin/users_update/store',
                    data: formData,
                    type: 'POST',
                    success: function(data){
                        $(".loading").hide();
                        if(data.estado !== "undefined" && data.estado == false){
                            alert("¡Error Técnico! Comuníquese con Soporte! Asegure que esté subiendo correctamente el Excel, con sus datos especificos.");
                        } else {
                            $(".loading").hide();

                            $(".alert.alert-success").show();
                            setTimeout(function(){ window.location = "/admin/users"; }, 4000);

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