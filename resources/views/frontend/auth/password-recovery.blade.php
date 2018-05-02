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
    @if(isset($message) && $message == true)
        <div class="content text-center">
            <div class="title">
                <i class="fa fa-envelope-open icon-large" aria-hidden="true"></i>
                <h3>Enviada</h3>
            </div>
            <p>Te enviamos un email con tu nueva contraseña. Una vez que ingreses, desde "Mi cuenta" vas a poder cambiarla por una que recuerdes.</p>
            <a href="index.html" class="btn btn-block">Volver</a>
        </div>
    @else
        <div class="content">
            <form action="">
                <h3 class="title text-center">Recuperar contraseña</h3>
                <div class="alert alert-danger" role="alert">El código y la dirección de email no coinciden.</div>
                <div class="form-group has-error">
                    <label class="form-label" for="recovery-code">Código ITEC</label>
                    <input class="form-control is-invalid" type="text" id="recovery-code" placeholder="Código ITEC">
                    <div class="invalid-feedback">Código inexistente.</div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="recovery-email">Email</label>
                    <input class="form-control" type="email" id="recovery-email" placeholder="Email"> </div>
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