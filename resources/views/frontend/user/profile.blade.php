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
        <a href="{{ url('/encuestas/1') }}">Completá nuestra Encuesta y <strong>sumá puntos</strong> adicionales a tu cuenta ahora!</a>
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
                                <input type="text" class="form-control" name="dni" value="{{ $dni[0]['dni'] }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Nombre</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" name="dni_name" value="{{ $dni[0]['name'] }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Apellido</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" name="dni_last_name" value="{{ $dni[0]['last_name'] }}" readonly>
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
                            <label class="col col-sm-3 col-form-label">Fecha de Ingreso</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" name="user_profile_admission_date" value="{{ ($user_profile[0]['admission_date'] ? $user_profile[0]['admission_date'] : "No estás asignado a ninguna Fecha de Ingreso") }}" readonly>
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
                                <input type="text" class="form-control" name="user_profile_address" value="{{ ($user_profile[0]['address'] ? $user_profile[0]['address'] : "No estás asignado a ninguna Dirección") }}" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Codigo Postal</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" name="user_profile_cp" value="{{ ($user_profile[0]['cp'] ? $user_profile[0]['cp'] : "No estás asignado a ningun CP") }}" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Ciudad/Localidad</label>
                            <div class="col col-sm-9">
                                <select class="form-control" name="user_profile_id_city" readonly>
                                    <option value="{{ $user_profile[0]['id_city'] }}">{{ \App\Cities::getName($user_profile[0]['id_city']) }}</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Provincia</label>
                            <div class="col col-sm-9">
                                <select class="form-control" name="user_profile_id_province" readonly>
                                    <option value="{{ $user_profile[0]['id_province'] }}">{{ \App\Provinces::getName($user_profile[0]['id_province']) }}</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Agente</label>
                            <div class="col col-sm-9">
                                <select class="form-control" name="user_profile_id_agente" readonly>
                                    <option value="{{ $user_profile[0]['id_agente'] }}">{{ \App\Agentes::getName($user_profile[0]['id_agente']) }}</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Categorización de Usuario</label>
                            <div class="col col-sm-9">
                                <input type="text" class="form-control" name="user_profile_type_user" value="{{ ($user_profile[0]['type_user'] ? $user_profile[0]['type_user'] : "Vendedor") }}" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label">Región Comercial</label>
                            <div class="col col-sm-9">
                                <select class="form-control" name="dni_id_region" readonly>
                                    <option value="{{ $user_profile[0]['id_region'] }}">{{ \App\Regions::getName($user_profile[0]['id_region']) }}</option>
                                </select>
                            </div>
                        </div>
                        
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