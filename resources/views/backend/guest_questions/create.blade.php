@extends('layouts.backend')

@section('title', "Encuestas / Pregunta de Encuesta / Alta")
@section('content')
{!! Form::open(['route' => 'admin.guests.questions.store', 'method' => 'POST']) !!}
    <div class="form-group">
        <label>Pregunta de Encuesta:</label>
        <input type="text" class="form-control" name="guest_question" placeholder="Pregunta de Encuesta" required>
    </div>

    <div class="form-group">
        <label>Encuesta:</label>
        <select class="form-control" name="id_guest" required>
            <option value="">Seleccionar...</option>
            @foreach($guests as $guest)
            <option value="{{ $guest->id }}">{{ $guest->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="active_guest_question">Tipo Input:</label>
        <select class="form-control" name="type_input_question" id="type_input_question" required>
            <option value="0">Radio</option>
            <option value="1">Texto</option>
            <option value="2">Checkbox</option>
            <option value="3">TextArea</option>
        </select>
    </div>

    <div class="form-group" id="content_posibles_respuestas">
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
        <ul class="" id="content_question_options"></ul>
    </div>

    <!-- PUSH 'posibles respuestas' -->
    <input type="hidden" name="options_guest_question" id="options_guest_question" value="">

    <div class="form-group">
        <label for="active_guest_question">Orden:</label>
        <select class="form-control" name="order_question" disabled>
            <option>Disponible editando la pregunta una vez Creada</option>
        </select>
    </div>

    <div class="form-group">
        <label for="active_guest_question">Activo:</label>
        <select class="form-control" name="active_guest_question" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection

@section('content-footer')
<i>* El Orden de las Preguntas de Encuestas se deben Dar editandola.</i>
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
        var options = [];
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
        
        $("#type_input_question").change(function(){
            
            if($(this).val() == 1){
                
                $("#content_posibles_respuestas").hide();
                options = [];
                $('#options_guest_question').attr('value','');
                $('#content_question_options').empty();
                
            } else {
                $("#content_posibles_respuestas").show();
            }
        
        });
    
    });
</script>    
@endsection