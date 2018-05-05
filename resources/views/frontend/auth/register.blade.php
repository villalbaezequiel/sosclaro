@extends('layouts.frontend')

@section('title', "Crear mi cuenta")
@section('content')
<main class="main main-guest">
    <section class="section section-login">
        <hgroup>
            <h1>
                <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="SOS CLARO">
            </h1>
        </hgroup>
        <div class="content">
            <form id="form_register" role="form" method="POST" action="{{ url('/registro/store') }}">
                {{ csrf_field() }}
                
                <h3 class="title text-center">Mi Cuenta</h3>
                
                
                <div id="alert_register" class="" role="alert"></div>
                                
                @if (session('message'))
                    <div class="alert alert-danger" role="alert">{{ session('message') }}</div>
                @endif
                
                <div class="form-group has-error">
                    <label class="form-label" for="dni">DNI</label>
                    <input class="form-control" type="number" name="dni" id="dni" placeholder="DNI" required>
                </div>
                
                <div class="form-group has-error">
                    <label class="form-label" for="name">Alias</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Alias Usuario" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="password">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="password2">Repetir Contraseña</label>
                    <input class="form-control" type="password" name="password2" id="password2" placeholder="Repetir Contraseña" required>
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-block" value="CREAR">
                </div>
            </form>
        </div>
        <div class="actions">
            <a href="{{ url('/') }}">Volver</a>
        </div>
    </section>
</main>    
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function() {
 
	var form = $('#form_register');
	var dni = $('[name=dni]');
	var name = $('[name=name]');
	var email = $('[name=email]');
	var pass1 = $('[name=password]');
	var pass2 = $('[name=password2]');
        
	var confirmacion = "Las contraseñas si coinciden";
	var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
        
	var span = $('#alert_register');
	span.hide();
        
	function coincidePassword(){
            var valor1 = pass1.val();
            var valor2 = pass2.val();
            
            span.show().removeClass();
            
            if(valor1 != valor2){
                span.text(negacion).addClass('alert alert-danger');
            }
            if(valor1.length==0 || valor1==""){
                span.text(vacio).addClass('alert alert-danger');
            }
            if(valor1.length<6 || valor1.length>10){
                span.text(longitud).addClass('alert alert-danger');
            }
            if(valor1.length!=0 && valor1==valor2){
                span.text(confirmacion).removeClass("alert alert-danger");
                span.hide();
            }
	}
        
	pass2.keyup(function(){
            coincidePassword();
	});
        
        form.submit(function(){
            var valor1 = pass1.val();
            var valor2 = pass2.val();
            
            if((valor1.length!=0 && valor1==valor2 && dni.val().length!=0 && name.val().length!=0 && email.val().length!=0)){
                form.submit();
                return true;
            } else {
                return false;
            }
            
        });
});
</script>
@endsection