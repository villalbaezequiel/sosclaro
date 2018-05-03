@extends('layouts.frontend')

@section('title', "Mi cuenta")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    <div class="alert alert-info">Sabías que completando tu perfil tenes
        <strong>20 puntos</strong> de regalo?</div>
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Mi cuenta</span>
        </hgroup>
        <article class="section-content">
            <div class="article">
                <div class="article-body">
                    <form>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="user1">Código ITEC</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" id="user1" placeholder="12378128397" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="user1">Nombre</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" id="user1" value="Lucas Rene" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="user1">Apellido</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" id="user1" value="Marozzi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="user1">DNI</label>
                            <div class="col col-sm-9">
                                <input type="number" class="form-control" id="user1" value="29123876" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="user1">Email</label>
                            <div class="col col-sm-9">
                                <input type="email" class="form-control" id="user1" value="lucar.marozzi@claro.com.ar" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="user1">Sexo</label>
                            <div class="col col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="encuestaPreguntaRadios" id="encuestaPreguntaRadios1" value="option1" checked>
                                    <label class="custom-control-label" for="encuestaPreguntaRadios1">Masculino</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="encuestaPreguntaRadios" id="encuestaPreguntaRadios2" value="option2">
                                    <label class="custom-control-label" for="encuestaPreguntaRadios2">Femenino</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="user1">Nacimiento</label>
                            <div class="col col-sm-3">
                                <input type="number" class="form-control" id="user1" placeholder="DD" required>
                            </div>
                            <div class="col col-sm-3">
                                <input type="number" class="form-control" id="user1" placeholder="MM" required>
                            </div>
                            <div class="col col-sm-3">
                                <input type="number" class="form-control" id="user1" placeholder="YYYY" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="user1">Teléfono</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" id="user1" placeholder="+5491159998888" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label" for="user1">Región</label>
                            <div class="col col-sm-9">
                                <select class="form-control" id="encuestaPregunta2">
                                    @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="article-footer">
                    <p>
                        <a href="{{ url('/') }}">Volver</a>
                    </p>
                </div>
            </div>
        </article>
    </section>
</main>
@endsection