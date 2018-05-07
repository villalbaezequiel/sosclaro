@extends('layouts.frontend')

@section('title', "Ingresar")
@section('content')
@include('frontend.components.header_auth')
<main class="main main-pre">
    <section class="section section-pre">
        <section class="section-wrapper">
            <hgroup class="section-header">
                <span class="title text-black">Ingresar</span>
            </hgroup>
            <article class="section-content">
                <div class="article text-black">
                    <div class="article-body">
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}    
                            
                            <div class="{{ $errors->has('email') ? 'alert alert-danger' : '' }}" role="alert">
                                @if ($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @endif
                            </div>
                            
                            <div class="{{ $errors->has('password') ? 'alert alert-danger' : '' }}" role="alert">
                                @if ($errors->has('password'))
                                    {{ $errors->first('password') }}
                                @endif
                            </div>
                            
                            
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="form-label" for="email">Email</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control{{ ($errors->has('email') || $errors->has('email')) ? ' is-invalid' : '' }}" placeholder="Email">
                            </div>
                            
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="form-label" for="password">Contraseña</label>
                                <input id="password" type="password" name="password" class="form-control{{ ($errors->has('email') || $errors->has('email')) ? ' is-invalid' : '' }}" placeholder="Contraseña">
                            </div>
                                
                            <div class="form-group">
                                <button type="submit" class="btn btn-block">INGRESAR</button>
                            </div>
                        </form>
                    </div>
                    <div class="actions text-center">
                        <a href="{{ url('/password/reset') }}">Recuperar contraseña</a>
                    </div>
                </div>
            </article>
        </section>
    </section>
</main>
@endsection