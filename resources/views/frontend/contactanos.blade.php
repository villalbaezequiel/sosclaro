@extends('layouts.frontend')

@section('title', "Bases y Condiciones")
@section('content')

@if(Auth::check())
    @include('frontend.components.header')
@else
    @include('frontend.components.header_auth')
@endif


<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Contactanos</span>
        </hgroup>
        <article class="section-content">
            <div class="article">
                <div class="article-body">
                    <form>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="contact-nombre">Nombre y apellido</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" id="contact-nombre" placeholder="Nombre y apellido" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="contact-dni">DNI</label>
                            <div class="col col-sm-9">
                                <input type="number" class="form-control" id="contact-dni" placeholder="DNI" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="contact-email">Email</label>
                            <div class="col col-sm-9">
                                <input type="email" class="form-control" id="contact-email" placeholder="ejemplo@gmail.com" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="contact-asunto">Asunto</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" id="contact-asunto" placeholder="Asunto" required> </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="contact-consulta">Consulta</label>
                            <div class="col col-sm-9">
                                <textarea class="form-control" id="contact-consulta" placeholder="Consulta" required></textarea>
                            </div>
                        </div>
                        <!-- acordate que el mail va a marketingoperativo@claro.com.ar-->
                        <div class="form-group">
                            <button class="btn btn-block" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </section>
</main>
@endsection