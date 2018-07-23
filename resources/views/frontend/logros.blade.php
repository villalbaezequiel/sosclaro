@extends('layouts.frontend')

@section('title', "Bases y Condiciones")
@section('content')

@if(Auth::check())
    @include('frontend.components.header')
@else
    @include('frontend.components.header_auth')
@endif

<main class="main main-pre">
  <section class="section section-pre">
      <div class="content">
          <div class="row">
              <div class="col col-md-6">
                  <h3>
                      <span class="badge badge-black">1</span> Mejor vendedor del mes</h3>
                  <p>Mensualmente el
                      <strong>mejor vendedor del país</strong> recibirá
                      <strong>400 puntos</strong>, mientras que los 3 mejores vendedores de cada región recibirán 200, 150 y 100 puntos respectivamente. ¿Qué indicadores tendremos en cuenta?</p>
                  <p>
                      <strong>1) Cantidad de tus PSRs asignados con compra:</strong>
                      <br />Este indicador va a medir el porcentaje de PSRs con compra de recarga de $200 o más, sobre el total de PSRs asigndos por vendedor.</p>
                  <p>
                      <strong>2) Cantidad de sus PSRs asignados con ICB.:</strong>
                      <br /> Este indicador va a medir el porcentaje de PSRs con ICB (primera recarga) sobre el total de PSRs asignados por vendedor.</p>
                  <small>
                      <p>
                          <strong>IMPORTANTE:</strong> participan todos los vendedores que tengan al menos 100 PSRs asignados.</p>
                  </small>
              </div>
              <div class="col col-md-6">
                  <h3>
                      <span class="badge badge-black">2</span> Mejor equipo del semestre</h3>
                  <p>Reconoceremos al
                      <strong>mejor equipo de ventas de las 10 regiones</strong>. Los indicadores serán los mismos que en los logros individuales.
                      <strong>¡A cada integrante del equipo ganador se le asignarán 50 puntos!</strong>
                  </p>
                  <small>
                      <p>
                          <strong>IMPORTANTE:</strong> se le asignarán puntos solamente a los vendedores que tengan a menos 100 PSRs asignados y que su resultado individual del período seal al menos el 50% del resultado grupal.</p>
                  </small>
                  <hr>
                  <h3>
                      <span class="badge badge-black">3</span> Mejor vendedor anual</h3>
                  <p>Se reconocerá el mejor vendedor del año de cada región!</p>
              </div>
              <hr>
              <div class="col col-md-12">
                  <div class="banner">
                      <h4>
                          <img src="{{ asset('assets/frontend/img/bonus-track.png') }}" alt="Bonus Track" />
                      </h4>
                      <p>Son logros espontáneos con variados objetivos y puntos extra.
                          <br />
                          <strong>¡Seguí de cerca el programa y sumá puntos extra!</strong>
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </section>
</main>

@endsection