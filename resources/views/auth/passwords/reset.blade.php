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
    
        <div class="content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}
                <h3 class="title text-center">Recuperar contraseña</h3>

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email: {{ $email or old('email') }}</label>
                    <input id="email" type="hidden" class="form-control" name="email" value="{{ $email or old('email') }}">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm">Confirmar contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block">CAMBIAR CONTRASEÑA</button>
                </div>
            </form>
                
        </div>
    </section>
</main>
@endsection
