@extends('layouts.backend')

@section('title', "MailChimp / Templates")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('content')
<table class="table table-bordered" id="list_mailchimp_templates" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Ir a:</th>
        </tr>
    </thead>
        <tr>
            <td>Test Template</td>
            <td>
                <a href="" class="btn btn-outline-primary">Editar Template</a>
            </td>
        </tr>
    <tbody>
        
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_mailchimp_templates").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection
