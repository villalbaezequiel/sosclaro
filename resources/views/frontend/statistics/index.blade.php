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
          <span class="title">
            Informes para <strong>{{ \App\Dni::getNameShort(Auth::user()->id) }}</strong>.
          </span>
        </hgroup>
        <hgroup class="section-header">
          <span class="title">
            {{ $type_user }}: <strong>{{ $type_user_the }}</strong>
          </span>
        </hgroup>
        <hgroup class="section-header">
          <span class="title">
            Vendedores de tu Equipo: <strong>{{ $count_users }}</strong>
          </span>
        </hgroup>
        <article class="section-content">

            <div class="card">
                <div class="card-header text-center">
                    <strong>Puntos Acumulados</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-centered">
                      <canvas id="results"></canvas>
                    </div>
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <strong>Puntos acumulados Bonus Track</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-centered">
                      <canvas id="bonus_track"></canvas>
                    </div>
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <strong>Top 10 Vendedores</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-centered" style="margin-bottom: 20px;">
                      <canvas id="top_then_users"></canvas>
                    </div>
                    <div class="col-md-12 col-centered">
                      <canvas id="top_then_history"></canvas>
                    </div>
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <strong>Canjes</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-centered">
                      <canvas id="exchanges_users"></canvas>
                    </div>
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <strong>Encuentas</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 col-centered">
                      <canvas id="guests_users_1"></canvas>
                    </div>
                    <div class="col-md-4 col-centered">
                      <canvas id="guests_users_2"></canvas>
                    </div>
                    <div class="col-md-4 col-centered">
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
<style media="screen">
  .col-centered {
    margin: 0 auto;
    float: none;
  }
</style>
@endsection

@section('javascript')
<script type="text/javascript">
    var id_user = {!! json_encode($id_user,JSON_FORCE_OBJECT) !!};
    var type_user = {!! json_encode($type_user,JSON_FORCE_OBJECT) !!};
</script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/statistics.js') }}"></script>
@endsection
