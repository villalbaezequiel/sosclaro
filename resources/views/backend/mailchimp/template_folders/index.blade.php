@extends('layouts.backend')

@section('title', "MailChimp / Templates / Carpetas ")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/mailchimp/template/folders/create') }}">Nueva Carpeta de Template/s</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_mailchimp_template_folders" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Carpeta Prueba Templates</td>
            <td>
                <a href="{{ url('/admin/mailchimp/template/folders/show') }}" class="btn btn-outline-primary">Ver Templates</a>
                <a href="{{ url('/admin/mailchimp/template/folders/edit') }}" class="btn btn-outline-primary">Editar</a>
            </td>

        </tr>
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_mailchimp_template_folders").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection
