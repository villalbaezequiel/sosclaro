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
            <div class="list-group list-group-flush">
                
                @foreach($guests as $guest)
                    @if(\App\GuestUsers::getCheckGuest($id_user, $guest['id']))
                        <span class="list-group-item list-group-item-action disabled">
                            <i class="fa fa-check-square"></i> {{ $guest['name'] }}</span>
                    @else        
                        <a class="list-group-item list-group-item-action" href="{{ url('/encuestas') }}/{{ $guest['id'] }}">
                            <i class="fa fa-square-o"></i> {{ $guest['name'] }}
                        </a>
                    @endif
                @endforeach
            </div>
        </article>
    </section>
</main>
@endsection