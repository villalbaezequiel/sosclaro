@extends('layouts.backend')

@section('title', "Usuarios / Editar")
@section('content')
{!! Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
    
    <!-- Model Dni-->
    <div class="form-group">
        <label>DNI</label>
        <input type="text" name="dni" class="form-control" value="{{ $user_dni[0]->dni }}" disabled>
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" name="name_dni" value="{{ $user_dni[0]->name }}" required>
    </div>

    <div class="form-group">
        <label>Apellido</label>
        <input type="text" class="form-control" name="last_name_dni" value="{{ $user_dni[0]->last_name }}" required>
    </div>
    <!-- end model Dni -->
    
    <!-- Model User -->
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email_user" placeholder="Email Usuario" value="{{ $user->email }}" required>
    </div>
    <!-- end model User-->

    @if($user_profile && !empty($user_profile[0]))
    
    <div class="form-group">
        <label>Fecha de Ingreso</label>                    
        <input type="text" class="form-control" name="admission_date_user_profile" value="{{ $user_profile[0]->admission_date }}" required>
    </div>
    
    <div class="form-group">
        <label>Domicilio Personal</label>
        <input type="text" class="form-control" name="address_user_profile" value="{{ $user_profile[0]->address }}" required>
    </div>
    
    <div class="form-group">
        <label>Codigo Postal</label>
        <input type="text" class="form-control" name="cp_user_profile" value="{{ $user_profile[0]->cp }}" required>
    </div>
    
    <div class="form-group">
        <label>Ciudad/Localidad</label>
        <select class="form-control" name="city_user_profile" required>
            @foreach($cities as $city)
                <option value="{{ $city->id }}" @if($city->id == $user_profile[0]->id_city) selected="selected" @endif>{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label>Provincia</label>
        <select class="form-control" name="province_user_profile" required>
            @foreach($provinces as $province)
                <option value="{{ $province->id }}" @if($province->id == $user_profile[0]->id_province) selected="selected" @endif>{{ $province->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label>Agentes</label>
        <select class="form-control" name="agente_user_profile" required>
            @foreach($agentes as $agent)
                <option value="{{ $agent->id }}" @if($agent->id == $user_profile[0]->id_agente) selected="selected" @endif>{{ $agent->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Categorizacion de Usuario</label>
        <select class="form-control" name="type_user_user_profile" required>
            <option value="Vendedor" @if('Vendedor' == $user_profile[0]->type_user) selected="selected" @endif>Vendedor</option>
            <option value="Supervisor" @if('Supervisor' == $user_profile[0]->type_user) selected="selected" @endif>Supervisor</option>
            <option value="Gerente" @if('Gerente' == $user_profile[0]->type_user) selected="selected" @endif>Gerente</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>Region</label>
        <select class="form-control" name="region_dni" required>
            @foreach($regions as $region)
                <option value="{{ $region->id }}" @if($region->id == $user_dni[0]->id_region) selected="selected" @endif>{{ $region->name }}</option>
            @endforeach
        </select>
    </div>
    
    @endif
    <!-- end table USERS_PROFILE -->
    
    <!-- Model User -->
    <div class="form-group">
        <label>Activo</label>
        <select class="form-control" name="active_user" required>
            <option value="1" @if($user->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($user->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
    
    <input type="hidden" name="id_user_profile" value="{{ $user_profile[0]->id }}">
    <input type="hidden" name="dni" value="{{ $user_dni[0]->dni }}">
    <input type="hidden" name="id_dni" value="{{ $user_dni[0]->id }}">
    <input type="hidden" name="id_user" value="{{ $user->id }}">
    
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection