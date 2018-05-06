@extends('layouts.frontend')

@section('title', "Ingresar")
@section('content')
<main class="main main-guest">
    <section class="section section-login">
        <hgroup>
            <h1>
                <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="SOS CLARO">
            </h1>
        </hgroup>
        <div class="content">
            <form role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}    
                <h3 class="title text-center">Ingresar</h3>
                
                <div class="{{ $errors->has('email') ? 'alert alert-danger' : '' }}" role="alert">
                    @if ($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif
                </div>
                
                <div class="{{ $errors->has('password') ? 'alert alert-danger' : '' }}" role="alert">
                    @if ($errors->has('password'))
                        {{ $errors->first('password') }}
                    @endif
                </div>
                
                @if (session('message'))
                    <div class="alert alert-info" role="alert">{{ session('message') }}</div>
                @endif
                
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="form-label" for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control{{ ($errors->has('email') || $errors->has('email')) ? ' is-invalid' : '' }}" placeholder="Email">
                </div>
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="form-label" for="password">Contraseña</label>
                    <input id="password" type="password" name="password" class="form-control{{ ($errors->has('email') || $errors->has('email')) ? ' is-invalid' : '' }}" placeholder="Contraseña">
                </div>
                    
                <div class="form-group">
                    <button type="submit" class="btn btn-block">INGRESAR</button>
                </div>
            </form>
        </div>
        <div class="actions">
            <a href="{{ url('/') }}">Volver</a> |
            <a href="{{ url('/password/reset') }}">Recuperar contraseña</a>
        </div>
    </section>
</main>
@endsection