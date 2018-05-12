@extends('layouts.frontend')

@section('title', "Mis Canjes")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Mis canjes</span>
        </hgroup>
        <article class="section-content">
            
                @if($exchanges)
                <div class="row">
                    @foreach($exchanges as $canje)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset(\App\Products::getUrlImage($canje['id_product'])) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ \App\Products::getName($canje['id_product']) }}</h5>
                                <h6 class="card-subtitle">
                                    <span class="badge badge-danger">{{ \App\Products::getValuePuntos($canje['id_product']) }} puntos</span>
                                </h6>
                            </div>
                            <div class="card-footer">
                                @if($canje['status'] == 1)
                                    <a href="{{ url('/usuario/canjes').'/'.$canje['id'] }}">
                                        <i class="fa fa-square-o"></i> Confirmar recepción</a> (
                                    <i class="fa fa-truck"></i> Envío realizado )
                                @elseif($canje['status'] == 2)
                                    <i class="fa fa-check-square"></i> Recepción confirmada
                                @else
                                    <i class="fa fa-truck"></i> Envio Pendiente
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>    
                @else
                <div class="card-body">
                    <p class="text-center">Aún no se han realizado canjes</p>
                </div>
                @endif
        </article>
    </section>
</main>
@endsection