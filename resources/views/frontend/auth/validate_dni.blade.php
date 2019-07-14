@extends('layouts.frontend')

@section('title', "Validar DNI")
@section('content')
@include('frontend.components.header_auth_validate')

<main class="main main-pre">
    <section class="section section-pre">
        <section class="section-wrapper">
            <hgroup class="section-header">
                <span class="title text-black">Validar DNI</span>
            </hgroup>
            <article class="section-content">
                <div class="article text-black">
                    <div class="article-body">
                        <form id="form_register" role="form" method="POST" action="{{ url('/validar-dni') }}">
                            {{ csrf_field() }}

                            @if (session('message'))
                                <div class="alert alert-danger" role="alert">{{ session('message') }}</div>
                            @endif

                            
                            <div class="alert alert-success" role="alert">Por favor ingrese su DNI para ser Validado!</div>

                            <div class="form-group">
                                <label class="form-label" for="signup-dni">Nombre</label>
                                <input class="form-control" type="text" name="name" placeholder="Nombre" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="signup-dni">Apellido</label>
                                <input class="form-control" type="text" name="last_name" placeholder="Apellido" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="signup-dni">DNI</label>
                                <input class="form-control" type="number" name="dni" id="dni" placeholder="DNI" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-block" value="VALIDAR">
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </section>
    </section>
</main>
@endsection