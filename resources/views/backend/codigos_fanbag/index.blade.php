@extends('layouts.backend')

@section('title', "Usuarios / Codigos Fanbag")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/codigos_fanbag/create') }}">Importar Codigos Fanbag</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_codigo_fanbag" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fanbag</th>
            <th>Codigo</th>
            <th>Active</th>
            <th>Fecha de vencimiento</th>
        </tr>
    </thead>
    <tbody>
        @foreach($codigos as $codigo)
        <tr>

            <td>{{$codigo->id}}</td>
            
            <td>{{ $codigo->fanbag }}</td>
            <td>{{ $codigo->codigo_fanbag }}</td>
            <td>{{ $codigo->active }}</td>
            <td>{{ $codigo->expires }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_dni").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
    
});
</script>
@endsection