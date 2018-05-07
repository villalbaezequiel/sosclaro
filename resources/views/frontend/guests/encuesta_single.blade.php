@extends('layouts.frontend')

@section('title', "Encuestas")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    <div class="alert alert-info">Sabías que completando esta encuesta obtenés
        <strong>{{ $guest[0]['puntos'] }} puntos</strong> de regalo?</div>
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Encuesta</span>
        </hgroup>
        <article class="section-content">
            <div class="article">
                <div class="article-header">
                    <h3>{{ $guest[0]['name'] }}</h3>
                </div>
                <div class="article-body">
                    <form class="encuesta was-validated" action="{{ url('encuestas').'/'.$guest[0]['id'] }}" method="POST">
                        {{ csrf_field() }} 
                        @foreach($guest_questions as $question)
                            <div class="form-group">
                                <label for="encuestaPreguntaRadios">{{ $question['question'] }}</label>
                                <?php 
                                    $options = json_decode($question['options']);
                                ?>
                                @foreach($options as $option)
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="questions[][{{ $question['id'] }}]" id="{{ $question['id'] }}_{{ $option }}" value="{{ $option }}">
                                        <label class="custom-control-label" for="{{ $question['id'] }}_{{ $option }}">{{ $option }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        <div class="form-group">
                            <input type="hidden" name="id_guest" value="{{ $guest[0]['id'] }}">
                            <input type="hidden" name="puntos_guest" value="{{ $guest[0]['puntos'] }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button type="submit" class="btn btn-block">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="article-footer">
                    <p>
                        <a href="{{ url('/encuestas') }}">Volver</a>
                    </p>
                </div>
            </div>
        </article>
    </section>
</main>
@endsection