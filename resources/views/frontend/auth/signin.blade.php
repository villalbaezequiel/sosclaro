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
            <form action="">
                <h3 class="title text-center">Ingresar</h3>
                <div class="alert alert-danger" role="alert">El código y la contraseña no coinciden.</div>
                <div class="form-group has-error">
                    <label class="form-label" for="signin-code">Código ITEC</label>
                    <input class="form-control is-invalid" type="text" id="signin-code" placeholder="Código ITEC">
                    <div class="invalid-feedback">Código inexistente.</div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="signin-password">Contraseña</label>
                    <input class="form-control" type="password" id="signin-password" placeholder="Contraseña"> </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block">INGRESAR</button>
                </div>
            </form>
        </div>
        <div class="actions">
            <a href="{{ url('/') }}">Volver</a> |
            <a href="{{ url('recuperar-contrasena') }}">Recuperar contraseña</a>
        </div>
    </section>
</main>
@endsection