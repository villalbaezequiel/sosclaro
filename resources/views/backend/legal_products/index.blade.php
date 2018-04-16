@extends('layouts.backend')

@section('title', "Configuracion / Legales de Productos")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/settings/legal_products/'.$legal_products->id.'/edit') }}">Editar Legales de Productos</a>
@endsection
@section('content')
<div class="content">
    
    <h3 class="container">{{ $legal_products->title }}</h3>
    <div class="container">
       {{ $legal_products->description }} 
    </div>
    
</div>
@endsection
