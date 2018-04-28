@extends('layouts.backend')

@section('title', "Usuarios / Editar")
@section('content')
{!! Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" value="{{ $user_dni[0]->name }}" disabled>
    </div>

    <div class="form-group">
        <label>Apellido</label>
        <input type="text" class="form-control" value="{{ $user_dni[0]->last_name }}" disabled>
    </div>

    <div class="form-group">
        <label>DNI</label>
        <input type="text" class="form-control" value="{{ $user_dni[0]->dni }}" disabled>
    </div>

    <div class="form-group">
        <label>Indicador</label>
        <input type="text" class="form-control" value="{{ \App\Indicadores::getNameJson($user_dni[0]->indicador) }}" disabled>
    </div>

    <div class="form-group">
        <label>Puntos</label>
        <input type="number" class="form-control" name="puntos_dni" placeholder="Puntos Usuario" value="{{ $user_dni[0]->puntos }}" disabled>
    </div>

    <!-- end table DNI -->

    <div class="form-group">
        <label>Ubicacion</label>
        <select class="form-control" name="city_user_profile" required>
            @foreach($cities as $city)
                <option value="{{ $city->id }}" @if($city->id == $user_profile[0]->id_city) selected="selected" @endif>{{ $city->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Region</label>
        <select class="form-control" name="region_user_profile" required>
            @foreach($regions as $region)
                <option value="{{ $region->id }}" @if($region->id == $user_profile[0]->id_region) selected="selected" @endif>{{ $region->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label>Telefono</label>
        <input type="text" class="form-control" name="telephone_user_profile" placeholder="Telefono Usuario" value="{{ $user_profile[0]->telephone }}" required>
    </div>
    
    <div class="form-group">
        <label>Otro Telefono</label>
        <input type="text" class="form-control" name="telephone_other_user_profile" placeholder="Otro Telefono Usuario" value="{{ $user_profile[0]->telephone_other }}" required>
    </div>
    
    <div class="form-group">
        <label>Direccion</label>
        <input type="text" class="form-control" name="address_user_profile" placeholder="Direccion Usuario" value="{{ $user_profile[0]->address }}" required>
    </div>
    
    <!-- end table USERS_PROFILE -->
    
    <div class="form-group">
        <label>Alias</label>
        <input type="text" class="form-control" name="name_user" placeholder="Alias Usuario" value="{{ $user->name }}" required>
    </div>
    
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email_user" placeholder="Email Usuario" value="{{ $user->email }}" required>
    </div>

    <div class="form-group">
        <label>Activo</label>
        <select class="form-control" name="active_user" required>
            <option value="1" @if($user->active == 1) selected="selected" @endif>Si</option>
            <option value="0" @if($user->active == 0) selected="selected" @endif>No</option>
        </select>
    </div>
     <!-- end table USERS -->
     
    <input type="hidden" name="dni" value="{{ $user_dni[0]->dni }}">
    <input type="hidden" name="id_user_profile" value="{{ $user_profile[0]->id }}">
    <input type="hidden" name="id_user" value="{{ $user->id }}">
    
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="" onclick="window.history.go(-1); return false;" class="btn btn-danger">Cancelar</a>
{!! Form::close() !!}
@endsection