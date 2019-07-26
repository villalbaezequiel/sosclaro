@extends('layouts.backend')

@section('title', "MailChimp / Listas")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('content')
<table class="table table-bordered" id="list_mailchimp_lists" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Contacts</th>
            <th>Subscribers</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>mejoresvendedores</td>
            <td>100</td>
            <td>100</td>
            <td><a href="" class="btn btn-outline-primary">Add a Subscribers</a></td>
        </tr>
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_mailchimp_lists").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection
