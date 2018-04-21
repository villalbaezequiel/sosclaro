@extends('layouts.backend')

@section('title', "Preguntas de Encuestas")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('nav-button')
<a class="btn btn-primary mb-3" href="{{ url('/admin/guests/questions/create') }}">Nueva Pregunta de Encuesta</a>
@endsection

@section('content')
<table class="table table-bordered" id="list_guest_questions" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Pregunta</th>
            <th>Encuesta</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($guest_questions as $question)
        <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->question }}</td>
            <td>{{ \App\Guest::getNameGuest($question->id_guest) }}</td>
            <td>{{ \App\Functions::getActive($question->active) }}</td>
            <td>
                {!! Form::open(['route' => ['admin.guests.questions.destroy', $question->id], 'method' => 'DELETE']) !!}
                    <a href="{{ url('/admin/guests/questions/'.$question->id.'/edit') }}" class="btn btn-outline-primary">Editar</a>
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    $("#list_guest_questions").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
</script>
@endsection