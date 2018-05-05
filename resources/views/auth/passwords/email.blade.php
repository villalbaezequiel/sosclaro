@extends('layouts.frontend')

@section('title', "Recuperar contraseña")
@section('content')
<main class="main main-guest">
    <section class="section section-login">
        <hgroup>
            <h1>
                <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="SOS CLARO">
            </h1>
        </hgroup>
        
    @if (session('status'))
        <div class="content text-center">
            <div class="title">
                <i class="fa fa-envelope-open icon-large" aria-hidden="true"></i>
                <h3>Enviada</h3>
            </div>
            <p>Te enviamos un email con tu nueva contraseña. Una vez que ingreses, desde "Mi cuenta" vas a poder cambiarla por una que recuerdes.</p>
            <p>{{ session('status') }}</p>
            <a href="{{ url('/') }}" class="btn btn-block">Volver</a>
        </div>
    @else
    
        <div class="content">
            <form role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <h3 class="title text-center">Recuperar contraseña</h3>
                
                @if($errors->has('email'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                @endif    
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="form-label" for="email">Email</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-block">RECUPERAR</button>
                </div>
            </form>
        </div>
        <div class="actions">
            <a href="{{ url('/') }}">Volver</a>
        </div>
    @endif
    </section>
</main>
@endsection