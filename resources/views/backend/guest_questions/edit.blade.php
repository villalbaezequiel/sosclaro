@extends('layouts.backend')

@section('title', "Encuestas / Pregunta de Encuesta / Editar")
@section('content')
{!! Form::open(['route' => ['admin.guests.questions.update', $question->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label>Pregunta de Encuesta:</label>
        <input type="text" class="form-control" name="guest_question" value="{{ $question->question }}" placeholder="Pregunta de Encuesta" required>
    </div>

    <div class="form-group">
        <label>Encuesta:</label>
        <select class="form-control" name="id_guest" required>
            <option value="">Seleccionar...</option>
            @foreach($guests as $guest)
            <option value="{{ $guest->id }}" @if($question->id_guest == $guest->id) selected="selected"  @endif>{{ $guest->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Posibles Respuestas:</label>
        <div class="row">
            <div class="col-sm-9 mb-3">
                <input type="text" class="form-control" id="question_options" placeholder="Posibles Respuestas">
            </div>
            <div class="col-sm-3 mb-3">
                <a id="add_question_options" class="btn btn-outline-primary">Agregar</a>
                <a id="restart_question_options" class="btn btn-outline-danger">Resetear</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <ul class="" id="content_question_options">
            @foreach($options as $option)
            <li>{{ $option }}</li>
            @endforeach
        </ul>
    </div>

    <!-- PUSH 'posibles respuestas' -->
    <input type="hidden" name="options_guest_question" id="options_guest_question" value="{{ $options_string }}">

    <div class="form-group">
        <label for="active_guest_question">Activo:</label>
        <select class="form-control" name="active_guest_question" required>
            <option value="1" @if($question->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($question->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection
@section('javascript')
<script type="text/javascript">
    
    function addOptionQuestion(options){
        $('#options_guest_question').val('');
        $('#options_guest_question').attr('value',options);
    }
    
    function addListOption(val){
        $('#content_question_options').append('<li>'+val+'</li>');
    }
    
    $(document).ready(function(){
        var options = [$('#options_guest_question').val()];
        console.log(options);
        $('#add_question_options').click(function(){
            options.push($('#question_options').val());
            addOptionQuestion(options);
            addListOption($('#question_options').val());
            
            $('#question_options').val('');
        });
        
        $('#restart_question_options').click(function(){
            options = [];
            $('#options_guest_question').attr('value','');
            $('#content_question_options').empty();
        });
    });
</script>    
@endsection