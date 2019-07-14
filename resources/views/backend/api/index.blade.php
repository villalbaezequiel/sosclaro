@extends('layouts.backend')

@section('title', "Configuracion / API")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/settings/api/'.$api_version->id.'/edit') }}">Editar Version de API</a>
@endsection
@section('content')
<div class="content">
    
    <h5 class="container">*{{ $api_version->title }}: <span>{{ $api_version->version }}</span></h5>
    
</div>
@endsection
