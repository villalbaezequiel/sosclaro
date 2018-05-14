@extends('layouts.frontend')

@section('title', "Encuestas")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    
    @if($user_profile[0]['status'] == 0)
        <div class="alert alert-info">Sabías que completando tu perfil tenes
            <strong>20 puntos</strong> de regalo?
        </div>
    @endif
    
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
                                @if($question['type_input'] == 0)
                                    <?php 
                                        $options = json_decode($question['options']);
                                    ?>
                                    @foreach($options as $option)
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="questions[][{{ $question['id'] }}]" id="{{ $question['id'] }}_{{ $option }}" value="{{ $option }}">
                                            <label class="custom-control-label" for="{{ $question['id'] }}_{{ $option }}">{{ $option }}</label>
                                        </div>
                                    @endforeach
                                @endif
                                @if($question['type_input'] == 2)
                                    <?php 
                                        $options = json_decode($question['options']);
                                    ?>
                                    @foreach($options as $option)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="questions[][{{ $question['id'] }}]" id="{{ $question['id'] }}_{{ $option }}" value="{{ $option }}">
                                            <label class="custom-control-label" for="{{ $question['id'] }}_{{ $option }}">{{ $option }}</label>
                                        </div>
                                    @endforeach
                                @endif
                                @if($question['type_input'] == 1)
                                    <input type="text" class="form-control" name="questions[][{{ $question['id'] }}]" id="{{ $question['id'] }}_{{ $option }}">
                                @endif
                                @if($question['type_input'] == 3)
                                    <textarea class="form-control" name="questions[][{{ $question['id'] }}]" id="{{ $question['id'] }}_{{ $option }}"></textarea>
                                @endif
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