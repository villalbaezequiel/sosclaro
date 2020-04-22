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
                    <p>SOSClaro, es un programa de reconocimiento e incentivo dirigido a todos los vendedores de distribución del país, que tiene como objetivo brindar un espacio de comunicación y reconocimiento donde podremos compartir tus logros
                        individuales y grupales entre todo el equipo.</p>
                    <p>Porque SOSClaro, queremos conocerte, reconocerte y premiarte. Sumate al programa, sumá logros, suma premios.</p>
                </div>
            </div>
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
                    <strong>2) Cantidad de sus PSRs asignados con ICB:</strong>
                    <br /> Este indicador va a medir el porcentaje de PSRs con ICB (primera recarga) sobre el total de PSRs asignados por vendedor.
                    <br /> *Solo se considera ICB nominado el cual se contabilizará a los 5 días posteriores del cierre de mes
                </p>
                <p>
                    <strong>3) Crecimiento de ICB de tu agencia:</strong>
                    <br /> Este indicador va a medir el porcentaje de crecimiento de tu Agencia de ICB (primera recarga).</p>
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
                <p>¡Se reconocerá el mejor vendedor del año de cada región!</p>
                <hr>
                <h3>
                    <span class="badge badge-black">4</span> Vendedores Destacados</h3>
                <p>Reconoceremos mensualmente a los vendedores que logren <strong>mejores promedios de venta de sims con carga inicial</strong> en su cartera de PSRs.</p>
                
            </div>
            <hr>
            <div class="col col-md-12">
                <div class="banner" style="background: none;padding:  2em 0em 1em;">
                    <img src="http://mejoresvendedores.com.ar/assets/frontend/img/image_que_es.png" />
                </div>
            </div>
            <hr>
        </div>
    </section>
</main>

@endsection