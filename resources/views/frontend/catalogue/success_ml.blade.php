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
                <h3>Felicitaciones!</h3>
                <p class="lead">El canje ha sido realizado.
                    <br> En los próximos días lo enviaremos a tu base de operaciones.</p>
                <a class="btn" href="{{ url('/catalogo') }}">Continuar canjeando</a>
            </div>
        </article>
    </section>
</main>
@endsection
