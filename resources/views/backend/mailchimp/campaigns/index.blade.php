@extends('layouts.backend')

@section('title', "MailChimp / Campañas")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/mailchimp/campaigns/create') }}">Nueva Camapaña</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_mailchimp_campaigns" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>To</th>
            <th>From</th>
            <th>Subject</th>
            <th>Content</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_mailchimp_campaigns").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection
