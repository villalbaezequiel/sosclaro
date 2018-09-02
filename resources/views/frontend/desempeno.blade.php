@extends('layouts.frontend')

@section('title', "Mis Logros")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
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
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Mis Logros</span>
        </hgroup>
        <article class="section-content">
            <div class="card text-center">
                <div class="card-header">
                    <h4>Esta semana sumaste
                        <span class="badge badge-danger">
                            @if(isset($ultimo_desempeno[0]) && !empty($ultimo_desempeno[0]))
                                {{ $ultimo_desempeno[0]->puntos }}
                            @else
                            0
                            @endif
                            puntos</span>
                    </h4>
                </div>
                                
                <div class="card-body">
                    <div class="row card-text">
                        <div class="col-md-6">
                            <h1 class="mb-0">
                                <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>
                                @if(isset($ultimo_desempeno[0]) && !empty($ultimo_desempeno[0]))
                                    {{ $ultimo_desempeno[0]->total }}
                                @else
                                    0
                                @endif
                            %</h1>
                        </div>
                        <div class="col-md-6 text-left">
                            <h6>
                                <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>
                                @if(isset($ultimo_desempeno[0]) && !empty($ultimo_desempeno[0]))
                                    {{ $ultimo_desempeno[0]->indicador_1."% Indicador 1" }}
                                @else
                                    0% Indicador 1
                                @endif
                            </h6>
                            <h6>
                                <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
                                @if(isset($ultimo_desempeno[0]) && !empty($ultimo_desempeno[0]))
                                    {{ $ultimo_desempeno[0]->indicador_2."% Indicador 2" }}
                                @else
                                    0% Indicador 2
                                @endif
                            </h6>
                        </div>
                    </div>
                </div>
                @if(isset($ultimo_desempeno[0]) && !empty($ultimo_desempeno[0]))
                    <div class="card-footer">Datos para la semana del {{ \App\Functions::getDate($ultimo_desempeno[0]->created_at) }}</div>
                @endif
            </div>
        </article>
        <!-- Aca esta el chart -->
        <article class="section-chart">
            <div class="chart-container">
                <canvas id="graphCanvas"></canvas>
            </div>
            <div class="text-center">
                <small>Gráfico basado en los últimos 12 registros máximo.</small>
            </div>
        </article>
        <article class="section-content">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Historial</strong>
                </div>
                <div class="card-body">

                    <!-- Esto va a estar más adelante pero dinámico (tienen que aprobar el presupuesto)-->
<!--                                <p class="text-center">
                        <img src="http://mejoresvendedores.com.ar/dev/maquetado/img/grafico-lineas.png" alt="">
                    </p>-->

                    @if(isset($all_desempeno[0]) && !empty($all_desempeno[0]))
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Indicador 1</th>
                                <th scope="col">Indicador 2</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_desempeno as $desempenos)
                                <tr>
                                    <td>{{ \App\Functions::getDate($desempenos->created_at) }}</td>
                                    <td>{{ $desempenos->indicador_1 }}</td>
                                    <td>{{ $desempenos->indicador_2 }}</td>
                                    <td>{{ $desempenos->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="text-center">Datos no cargados por el momento.</p>
                    @endif
                </div>
            </div>
        </article>
    </section>
</main>
@endsection
@section('javascript')
<script>
$(document).ready(function () {
    showGraph();
});
    
    function showGraph(){
        $.ajax({
            type: 'GET',
            url: '/desempeno_grafico',
            dataType: 'json',
            success: function(data){
                
                var labels = [];
                var indicador1 = [];
                var indicador2 = [];
                var total = [];

                $.each(data, function(key, value){
                    $.each(value, function(i, v){
                        labels.push(v.created_at);
                        indicador1.push(v.indicador_1);
                        indicador2.push(v.indicador_2);
                        total.push(v.total);
                    });
                });
                
                var historialUsuario = {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Indicador 1',
                            data: indicador1,
                            fill: false,
                            borderColor: 'rgb(0, 165, 142)',
                            lineTension: 0.1
                        },
                        {
                            label: 'Indicador 2',
                            data: indicador2,
                            fill: false,
                            borderColor: 'rgb(43, 116, 172)',
                            lineTension: 0.1
                        },
                        {
                            label: 'Total',
                            data: total,
                            fill: false,
                            borderColor: 'rgb(245, 71, 83)',
                            lineTension: 0.1
                        }
                    ]
                };
 
                    var graphTarget = $("#graphCanvas");

                    var myChart = new Chart(graphTarget, {
                        type: 'line',
                        data: historialUsuario,
                        options: {
                          scales: {
                            yAxes: [
                              {
                                ticks: {
                                  beginAtZero: true
                                }
                              }
                            ]
                          }
                        }
                    });
                    
            },
            error: function(xhr, status){
                console.log('Error: '+xhr);
            }
        });
    }        
</script>
@endsection