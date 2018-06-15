@extends('layouts.frontend')

@section('title', "Encuestas")
@section('content')

@include('frontend.components.header')
<main class="main main-user">

    @if (session('message'))
    <div class="alert alert-success">Felicitaciones completaste la encuesta obtenés
        <strong>{{ session('message') }} puntos</strong> de regalo</div>
    @endif
    
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Encuestas</span>
        </hgroup>
        <article class="section-content">
            <div class="card">
                <div class="card-header text-center">
                    <strong>A Completar</strong>
                </div>
                <div class="card-body">
                @if(!empty($guests_incomplete))
                    <div class="list-group list-group-flush">
                    @foreach($guests_incomplete as $incomplete)
                        <a class="list-group-item list-group-item-action" href="{{ url('/encuestas') }}/{{ $incomplete['id'] }}">
                            <i class="fa fa-square-o"></i> {{ $incomplete['name'] }}</a>    
                    @endforeach
                    </div>
                @else
                    <p></p>
                    <p>Felicitaciones! No te quedan encuestas por completar.</p>
                @endif
                </div>
            </div>
            
            <div class="card">
                <div class="card-header text-center">
                    <strong>Completas</strong>
                </div>
                <div class="card-body">
                @if(!empty($guests_complete))
                    <div class="list-group list-group-flush">
                    @foreach($guests_complete as $complete)
                        <span class="list-group-item list-group-item-action disabled">
                            <i class="fa fa-check-square"></i> {{ $complete['name'] }}</span>
                    @endforeach
                    </div>
                @else
                    <p></p>
                    <p>Mmmm… Aún no has completado ninguna encuesta.</p>
                @endif
                </div>
            </div>
            
        </article>
    </section>
</main>
@endsection