@extends('layouts.frontend')

@section('title', "Dashboard")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    
    @if(\App\UsersProfile::getStatus(Auth::user()->id) == 0)
    <div class="alert alert-info">
        <strong>Bienvenido</strong>. Sabías que completando tu perfil obtenés
        <strong>20 puntos</strong> de regalo?
        <a href="{{ url('/usuario/mi-cuenta') }}">Completar</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    
    <section class="section section-dashboard">
        <div class="slider slider-single">
            @foreach($modals as $modal)
                <div class="slider-item">
                    <a href="{{ $modal->url }}">
                        <img class="visible-md-up" src="{{ asset('assets/frontend/img/header.png') }}">
                        <img class="visible-xs visible-sm" src="{{ asset('assets/frontend/img/header.png') }}">
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    <section class="section section-logros text-white">
        <div class="row">
            <div class="col col-md-6">
                <h3>
                    <span class="badge badge-black">1</span> Mejor vendedor del mes</h3>
                <p>Mensualmente el
                    <strong>mejor vendedor del país</strong> recibirá
                    <strong>400 puntos</strong>, mientras que los 3 mejores vendedores de cada región recibirán 200, 150 y 100 puntos respectivamente. ¿Qué indicadores tendremos en cuenta?</p>
                <p>
                    <strong>1) Cantidad de tus PSRs asignados con compra:</strong>
                    <br />Este indicador va a medir el porcentaje de PSRs con compra de recarga de $200 o más, sobre el total de PSRs asigndos por vendedor.</p>
                <p>
                    <strong>2) Cantidad de sus PSRs asignados con ICB.:</strong>
                    <br /> Este indicador va a medir el porcentaje de PSRs con ICB (primera recarga) sobre el total de PSRs asignados por vendedor.</p>
                <p>
                    <small>
                        <strong>IMPORTANTE:</strong> participan todos los vendedores que tengan al menos 100 PSRs asignados.</small>
                </p>
            </div>
            <div class="col col-md-6">
                <h3>
                    <span class="badge badge-black">2</span> Mejor equipo del semestre</h3>
                <p>Reconoceremos al
                    <strong>mejor equipo de ventas de las 10 regiones</strong>. Los indicadores serán los mismos que en los logros individuales.
                    <strong>¡A cada integrante del equipo ganador se le asignarán 50 puntos!</strong>
                </p>
                <p>
                    <small>
                        <strong>IMPORTANTE:</strong> se le asignarán puntos solamente a los vendedores que tengan a menos 100 PSRs asignados y que su resultado individual del período seal al menos el 50% del resultado grupal.</small>
                </p>
                <hr>
                <h3>
                    <span class="badge badge-black">3</span> Mejor vendedor anual</h3>
                <p>Se reconocerá el mejor vendedor del año de cada región!</p>
            </div>
            <hr>
            <div class="col col-md-12">
                <div class="banner">
                    <h4>
                        <img src="{{ asset('assets/frontend/img/bonus-track.png') }}" alt="Bonus Track" />
                    </h4>
                    <p>Son logros espontáneos con variados objetivos y puntos extra.
                        <br />
                        <strong>¡Seguí de cerca el programa y sumá puntos extra!</strong>
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection