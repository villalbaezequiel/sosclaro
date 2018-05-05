@extends('layouts.frontend')

@section('title', "Bienvenido")
@section('content')
<main class="main main-guest">
    <section class="section section-login">
        <hgroup>
            <h1>
                <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="SOS CLARO">
            </h1>
        </hgroup>
        <div class="content text-center">
            <div class="slider slider-home">
                <div class="slider-item">
                    <h4>¡Bienvenido!</h4>
                    <p>Conocé más sobre la plataforma de incentivos de Claro.</p>
                </div>
                <div class="slider-item">
                    <h4>Sumá puntos</h4>
                    <p>Mejorando tu desempeño y según tus logros, vas a sumar puntos semanalmente.</p>
                </div>
                <div class="slider-item">
                    <h4>Disfrutá de increíbles premios</h4>
                    <p>Vas a poder canjear tus puntos por premios y recibirlos en tu base de operaciones.</p>
                </div>
                <div class="slider-item">
                    <h4>Participás por un viaje</h4>
                    <p>El mejor puntaje a nivel nacional y el de cada región serán parte de un viaje inolvidable.</p>
                </div>
            </div>
        </div>
        <div class="actions">
            <a href="{{ url('/login') }}" class="btn btn-block">INGRESAR</a>
            <a href="{{ url('/registro') }}" class="btn btn-block">CREAR MI CUENTA</a>
        </div>
    </section>
</main>
@endsection