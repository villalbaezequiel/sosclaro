@extends('layouts.frontend')

@section('title', "Qué es?")
@section('content')

@include('frontend.components.header')

<main class="main main-pre">
    <section class="section section-pre">
        <div class="content">
            <div class="row">
                <div class="col col-md-7">
                    <div class="embed-responsive">
                        <video width="100%" controls preload autoplay>
                            <source src="{{ asset('assets/frontend/media/video-intro.webm') }}" type="video/webm">
                            <source src="{{ asset('assets/frontend/media/video-intro.mp4') }}" type="video/mp4">
                            <source src="{{ asset('assets/frontend/media/video-intro.ogv') }}" type="video/ogg">
                            <p>Your browser doesn't support HTML5 video tag.</p>
                        </video>
                    </div>
                </div>
                <div class="col col-md-5">
                    <h4>¿Qué es el programa?</h4>
                    <p>Sos Claro, es un programa de reconocimiento e incentivo dirigido a todos los vendedores de distribución del país, que tiene como objetivo brindar un espacio de comunicación y reconocimiento donde podremos compartir tus logros..</p>
                    <p>Queremos conocerte, reconocerte y premiarte. Sumate al programa. Sumá logros, suma premios.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-logros text-white">
        <div class="row">
            <div class="col col-md-6">
                <h3>
                    <span class="badge badge-black">1</span> Mejor vendedor del mes</h3>
                <p>Mensualmente los 3 mejores vendedores de cada región recibirán <strong>200, 150 y 100 puntos</strong> respectivamente. ¿Qué indicadores tendremos en cuenta?
                <p>
                    1) % PSRs con venta mayor a <strong>$800, respecto de la cartera asignada</strong> (peso: 35%)

                <p>
                    2) % PSRs con <strong>ICB mayor a $80, respecto de la cartera asignada</strong> (peso: 35%)
                </p>
                <p>
                    3) Crecimiento de PSRs con venta mayor a <b>$800</b> (peso 30%):
                    <span>&nbsp;&nbsp; a. Menor o igual a cero, no suma puntos.</span> <br/>
                    <span>&nbsp;&nbsp; b. Mayor a 0%, menor a 10%: 25%</span><br/>
                    <span>&nbsp;&nbsp; c. Mayor a 10%, menor a 20%: 50%</span><br/>
                    <span>&nbsp;&nbsp; d. Mayor a 20%, menor a 30%: 75%</span><br/>
                    <span>&nbsp;&nbsp; e. Mayor a 30%, 100%</span>
                </p>
                <p>
                    <small>
                        <strong>IMPORTANTE:</strong> Participan todos los vendedores que tengan al menos 100 PSRs asignados.
                    </small>
                </p>
            </div>
            <div class="col col-md-6">
                    <h3>
                        <span class="badge badge-black">2</span> Vendedores Destacados
                    </h3>
                    <img style="height: 40px; margin-bottom: 10px;" src="/assets/frontend/img/nuevo.png" />

                <p>
                    Reconoceremos mensualmente el alta de NUEVOS PSRs, correctamente registrados en ITEC.
                </p>
                <p><strong>Recibirán 5 puntos por PSR dado de alta.</strong></p>


                <!--
                <hr>
                <h3>
                    <span class="badge badge-black">3</span> Mejor vendedor anual</h3>
                <p>¡Se reconocerá el mejor vendedor del año de cada región!</p>
                <hr>
                <h3>
                    <span class="badge badge-black">4</span> Vendedores Destacados</h3>
                <p>Reconoceremos mensualmente a los vendedores que logren <strong>mejores promedios de venta de sims con carga inicial</strong> en su cartera de PSRs.</p>
                -->
            </div>

            <hr>
            <div class="col col-md-12">
                <div class="banner" style="background: none;padding:  2em 0em 1em;">
                    <img src="/assets/frontend/img/que_es.png" />
                </div>
            </div>
            <hr>
        </div>
    </section>
</main>

@endsection