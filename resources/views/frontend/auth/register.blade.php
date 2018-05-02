@extends('layouts.frontend')

@section('title', "Crear mi cuenta")
@section('content')
<main class="main main-guest">
    <section class="section section-login">
        <hgroup>
            <h1>
                <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="SOS CLARO">
            </h1>
        </hgroup>
        <div class="content">
            <form action="">
                <h3 class="title text-center">Mi Cuenta</h3>
                <div class="alert alert-danger" role="alert">Las contraseñas no coinciden.</div>
                <div class="form-group has-error">
                    <label class="form-label" for="signup-code">Código ITEC</label>
                    <input class="form-control is-invalid" type="text" id="signup-code" placeholder="Código ITEC">
                    <div class="invalid-feedback">Código inexistente.</div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="signup-dni">DNI</label>
                    <input class="form-control" type="text" id="signup-dni" placeholder="DNI"> </div>
                <div class="form-group">
                    <label class="form-label" for="signup-email">Email</label>
                    <input class="form-control" type="email" id="signup-email" placeholder="Email"> </div>
                <div class="form-group">
                    <label class="form-label" for="signup-password">Contraseña</label>
                    <input class="form-control" type="password" id="signup-password" placeholder="Contraseña"> </div>
                <div class="form-group">
                    <label class="form-label" for="signup-password2">Repetir Contraseña</label>
                    <input class="form-control" type="password" id="signup-password2" placeholder="Repetir Contraseña"> </div>
                <div class="form-group">
                    <button class="btn btn-block">CREAR</button>
                </div>
            </form>
        </div>
        <div class="actions">
            <a href="{{ url('/') }}">Volver</a>
        </div>
    </section>
</main>    
@endsection