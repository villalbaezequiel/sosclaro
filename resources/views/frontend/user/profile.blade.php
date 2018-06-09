@extends('layouts.frontend')

@section('title', "Mi cuenta")
@section('content')

@include('frontend.components.header')
<main class="main main-user">
    
    @if($user_profile[0]['status'] == 0)
        <div class="alert alert-info">Sabías que completando tu perfil tenes
            <strong>20 puntos</strong> de regalo?
        </div>
    @endif
    
    @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif

    <div class="alert alert-info">
        <a href="{{ url('/encuestas/1') }}">Completá muestra de Encuesta y <strong>sumá puntos</strong> adicionales a tu cuenta ahora!</a>
    </div>
    
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Mi cuenta</span>
        </hgroup>
        <article class="section-content">
            <div class="article">
                <div class="article-body">
                    <form action="{{ url('/usuario/mi-cuenta') }}" method="POST">
                        {{ csrf_field() }}    
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">DNI</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" value="{{ $dni[0]['dni'] }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Nombre</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" name="dni_name" value="{{ $dni[0]['name'] }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Apellido</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" name="dni_last_name" value="{{ $dni[0]['last_name'] }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Email</label>
                            <div class="col col-sm-9">
                                <input type="email" class="form-control" name="user_email" value="{{ Auth::user()->email }}" required>
                            </div>
                        </div>
                        
                        <!-- UserProfile -->
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Genero</label>
                            <div class="col col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="user_profile_sexo" id="user_profile_sexo_male" value="male" @if($user_profile[0]['sexo'] == 'male') checked @endif>
                                    <label class="custom-control-label" for="user_profile_sexo_male">Masculino</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="user_profile_sexo" id="user_profile_sexo_female" value="female" @if($user_profile[0]['sexo'] == 'female') checked @endif>
                                    <label class="custom-control-label" for="user_profile_sexo_female">Femenino</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Nacimiento</label>
                            <div class="col col-sm-3">
                                <input type="number" class="form-control" name="user_profile_date_year[]" @if(!empty($cumple)) value="{{ $cumple[0] }}" @endif placeholder="DD" required>
                            </div>
                            <div class="col col-sm-3">
                                <input type="number" class="form-control" name="user_profile_date_year[]" @if(!empty($cumple)) value="{{ $cumple[1] }}" @endif placeholder="MM" required>
                            </div>
                            <div class="col col-sm-3">
                                <input type="number" class="form-control" name="user_profile_date_year[]" @if(!empty($cumple)) value="{{ $cumple[2] }}" @endif placeholder="YYYY" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Teléfono</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" name="user_profile_telephone" value="{{ $user_profile[0]['telephone'] }}" placeholder="+5491159998888" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Otro Teléfono</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" name="user_profile_telephone_other" value="{{ $user_profile[0]['telephone_other'] }}" placeholder="+5491159998888" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Domicilio Personal</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" name="user_profile_address" value="{{ $user_profile[0]['address'] }}" placeholder="Av. Santa Fe 4321" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Región Comercial</label>
                            <div class="col col-sm-9">
                                <select class="form-control" name="user_profile_id_region" disabled="disabled">
                                    <option value="">Seleccionar...</option>
                                    @foreach($regions as $region)
                                    <option value="{{ $region->id }}" @if($region->id == $user_profile[0]['id_region']) selected="selected" @endif>{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
<!--                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Ciudad</label>
                            <div class="col col-sm-9">
                                <select class="form-control" name="user_profile_id_city" required>
                                    <option value="">Seleccionar...</option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}" @if($city->id == $user_profile[0]['id_city']) selected="selected" @endif>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>-->
                        
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                            <input type="hidden" name="dni_id" value="{{ $dni[0]['id'] }}" />
                            <input type="hidden" name="user_profile_id" value="{{ $user_profile[0]['id'] }}" />
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