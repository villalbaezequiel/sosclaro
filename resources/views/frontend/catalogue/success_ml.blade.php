@extends('layouts.frontend')

@section('title', "Canje")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Canje</span>
        </hgroup>
        <article class="section-content">
            <div class="jumbotron jumbotron-fluid text-center">
                <h3>¡Felicitaciones!</h3>
                <p class="lead">El canje ha sido realizado.
                    <br> Tu premio será acreditado dentro de las próximas 72hs.</p>
                <a class="btn" href="{{ url('/catalogo') }}">Continuar canjeando</a>
            </div>
        </article>
    </section>
</main>
@endsection
