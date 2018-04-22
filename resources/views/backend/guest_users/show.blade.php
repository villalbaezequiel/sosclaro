@extends('layouts.backend')

@section('title', "Encuestas / Completas por Usuarios / Ver")

@section('message')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection

@section('content')
{!! Form::open(['url' => '/admin/guests/users/export/'.$guest_user->id, 'method' => 'POST']) !!}
    <div class="form-group">
        <label>Nombre Usuario</label>
        <input type="text" class="form-control" value="{{ $user->name }}" disabled>
    </div>
    <div class="form-group">
        <label>Encuesta</label>
        <input type="text" class="form-control" value="{{ $guest->name }}" disabled>
    </div>
    <div class="form-group">
        <label>Resultados</label>
        <h1>FALTA ESTA PARTE</h1>
    </div>
    <button type="submit" class="btn btn-primary">Exportar Encuesta Completa del Usuario</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection