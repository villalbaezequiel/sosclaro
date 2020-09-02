@extends('layouts.frontend')

@section('title', "Crear mi cuenta")
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
                        <form id="form_register" role="form" method="POST" action="{{ url('/registro/store') }}">
                            {{ csrf_field() }}

                            <div id="alert_register" class="" role="alert"></div>
                            <div id="alert_register_email" class="" role="alert"></div>

                            @if (session('message'))
                                <div class="alert alert-danger" role="alert">{{ session('message') }}</div>
                            @endif

                            <div class="form-group">
                                <label class="form-label" for="signup-dni">DNI</label>
                                <input class="form-control" type="number" name="dni" id="dni" placeholder="DNI" required>
                            </div>
                            <!--                
                            <div class="form-group">
                                <label class="form-label" for="name">Alias</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Alias Usuario" required>
                            </div>-->

                            <div class="form-group">
                                <label class="form-label" for="dni_name">Nombre</label>
                                <input class="form-control" type="text" name="dni_name" id="dni_name" placeholder="Nombre" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="dni_last_name">Apellido</label>
                                <input class="form-control" type="text" name="dni_last_name" id="dni_last_name" placeholder="Apellido" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="email2">Repetir Email</label>
                                <input class="form-control" type="email" name="email2" id="email2" placeholder="Repetir Email" required>
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
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="signup-terminos" required>
                                    <label class="form-check-label" for="signup-terminos">Acepto las
{{--                                        <a href="{{ url('/terminos') }}" target="_blank">bases y condiciones</a>--}}
                                        <a href="{{ asset('assets/backend/docs/REGLAMENTO.pdf') }}" target="_blank">bases y condiciones</a>

                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-block" value="CREAR">
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </section>
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
	var email2 = $('[name=email2]');
	var pass1 = $('[name=password]');
	var pass2 = $('[name=password2]');
        
        //password2
	var confirmacion = "Las contraseñas si coinciden";
	var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
        
        //email2
	var confirmacionEmail = "Los email si coinciden";
	var negacionEmail = "No coinciden los email";
	var vacioEmail = "El email no puede estar vacía";
        
        //cartel alet password
	var span = $('#alert_register');
	span.hide();
        
        //cartel alet email
	var spanEmail = $('#alert_register_email');
	spanEmail.hide();
        
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
        
	function coincideEmail(){
            var valor1 = email.val();
            var valor2 = email2.val();
            
            spanEmail.show().removeClass();
            
            if(valor1 != valor2){
                spanEmail.text(negacionEmail).addClass('alert alert-danger');
            }
            if(valor1.length==0 || valor1==""){
                spanEmail.text(vacioEmail).addClass('alert alert-danger');
            }
            if(valor1.length!=0 && valor1==valor2){
                spanEmail.text(confirmacionEmail).removeClass("alert alert-danger");
                spanEmail.hide();
            }
	}
        
	pass2.keyup(function(){
            coincidePassword();
	});
        
	email2.keyup(function(){
            coincideEmail();
	});
        
        form.submit(function(){
            var valor1 = pass1.val();
            var valor2 = pass2.val();
            
            var valorEmail1 = email.val();
            var valorEmail2 = email2.val();
            
            if((valor1.length!=0 && valor1==valor2 && valorEmail1.length!=0 && valorEmail1==valorEmail2 && dni.val().length!=0 && name.val().length!=0)){
                form.submit();
                return true;
            } else {
                return false;
            }
            
        });
});
window.onload = function() {
 const myInput = document.getElementById('email2');
 myInput.onpaste = function(e) {
   e.preventDefault();
 }
}
</script>
@endsection