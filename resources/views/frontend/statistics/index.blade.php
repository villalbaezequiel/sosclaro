@extends('layouts.frontend')

@section('title', "Informes")
@section('content')

@include('frontend.components.header')
<main class="main main-user">

    @if (session('message'))
    <div class="alert alert-success">
      <strong>{{ session('message') }}</strong>
    </div>
    @endif

    <section class="section-wrapper">
        <hgroup class="section-header">
            <!-- <span class="title">Informes para { $user }. { $user_role }: { $user_zone }</span> -->
            <span class="title">Informes para <strong>Ezequiel Villalba</strong>. Gerente: <strong>Agencia Lavalle</strong></span>
        </hgroup>
        <article class="section-content">

            <div class="card">
                <div class="card-header text-center">
                    <strong>Alta de Vendedores</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <canvas id="users_create"></canvas>
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <strong>Resultados y Bonus Track</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <canvas id="results_puntos"></canvas>
                  </div>
                  <!--
                  mostrar en grafico la cantidad de puntos que se generaron por meses
                  segun los resultados y bonus track


                    vertical PUNTOS
                    horizontal MESES
                  -->
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <strong>Top 10 Vendedores</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <canvas id="top_then_users"></canvas>
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <strong>Canjes</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <canvas id="exchanges_users"></canvas>
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <strong>Encuentas</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <canvas id="guests_users_1"></canvas>
                    </div>
                    <div class="col-md-4">
                      <canvas id="guests_users_2"></canvas>
                    </div>
                    <div class="col-md-4">
                      <canvas id="guests_users_3"></canvas>
                    </div>
                  </div>
                  <!--
                    each Encuestas
                    {
                      Chart Single Encuesta :
                      * Completas
                      * Incompletas
                      100 Vendedores la realzaron. 10 aun no la realizaron
                    }
                  -->
                </div>
            </div>

        </article>
    </section>
</main>
@endsection

@section('javascript')
  @if($type_user != '' && $type_user != 'VENDEDOR' && $type_user != 'Vendedor' && $type_user != 'vendedor')
    <script type="text/javascript" src="{{ asset('assets/frontend/js/statistics.js') }}"></script>
  @endif
@endsection
