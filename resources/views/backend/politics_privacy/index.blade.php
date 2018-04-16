@extends('layouts.backend')

@section('title', "Configuracion / Politica y Privacidad")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/settings/politics_privacy/'.$politics_privacy->id.'/edit') }}">Editar Politica y Privacidad</a>
@endsection
@section('content')
<div class="content">
    
    <h3 class="container">{{ $politics_privacy->title }}</h3>
    <div class="container">
       {{ $politics_privacy->description }} 
    </div>
    
</div>
@endsection
