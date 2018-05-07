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
</main>

@endsection