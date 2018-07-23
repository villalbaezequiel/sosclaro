@extends('layouts.frontend')

@section('title', "Preguntas Frecuentes")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Preguntas Frecuentes</span>
        </hgroup>
        <article class="section-content">
            <div id="accordion">
                @foreach($preguntas_frecuentes as $pregunta)
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#{{ $pregunta->id }}">{{ $pregunta->pregunta }}</a>
                    </div>
                    <div id="{{ $pregunta->id }}" class="collapse" data-parent="#accordion">
                        <div class="card-body">{{ $pregunta->respuesta }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </article>
    </section>
</main>
@endsection