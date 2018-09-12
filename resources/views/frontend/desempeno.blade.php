@extends('layouts.frontend')

@section('title', "Mis Logros")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
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
                    <form class="row text-center">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="selectDesempenoMes">Mes</label>
                                <select class="form-control" id="selectDesempenoMes">
                                  @foreach(\App\Functions::getMonths() as $key => $val)
                                    <option value="{{ $key }}" @if($key == date('n')) selected="selected" @endif>{{ $val }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <!-- Esto va a estar más adelante pero dinámico (tienen que aprobar el presupuesto)-->
<!--                                <p class="text-center">
                        <img src="http://mejoresvendedores.com.ar/dev/maquetado/img/grafico-lineas.png" alt="">
                    </p>-->
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Concepto</th>
                                <th scope="col">Puntos</th>
                            </tr>
                        </thead>
                        <tbody id="content_desempeno">
                          @if(isset($all_desempeno[0]) && !empty($all_desempeno[0]))
                            @foreach($all_desempeno as $desempenos)
                                <tr>
                                    <td>{{ \App\Functions::getDate($desempenos->created_at) }}</td>
                                    <td>{{ $desempenos->asunto }}</td>
                                    <td>{{ $desempenos->puntos }}</td>
                                </tr>
                            @endforeach
                          @endif
                        </tbody>
                    </table>
                    <p id="empty_content_desempeno" @if(!isset($all_desempeno[0]) && empty($all_desempeno[0])) class="text-center"  @else class="text-center hidden" @endif>Datos no cargados por el momento.</p>
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
    
    //history perfomance
    $("#selectDesempenoMes").change(function(){
        
        $.ajax({
            type: 'GET',
            url: '/desempeno_for_month/'+$(this).val(),
            dataType: 'json',
            success: function(data){
              var desempenos_for_month = data.desempenos_for_month;
                
              $("#content_desempeno").empty();
              $.each(desempenos_for_month, function(k, v){
                $("#content_desempeno").append('<tr><td>'+v.created_at+'</td><td>'+v.asunto+'</td><td>'+v.puntos+'</td></tr>');
              });
              if(desempenos_for_month.length === 0){
                $("#empty_content_desempeno").removeClass('hidden');
              } else {
                $("#empty_content_desempeno").addClass('hidden');
              }
            },
            error: function(xhr, status){
                console.log('Error: '+xhr);
            }
        });
    
    });
});
    
    function showGraph(){
        $.ajax({
            type: 'GET',
            url: '/desempeno_grafico',
            dataType: 'json',
            success: function(data){
                
                var labels = [];
                var puntos = [];

                $.each(data, function(key, value){
                    $.each(value, function(i, v){
                        labels.push(v.created_at);
                        puntos.push(v.puntos);
                    });
                });
                
                var historialUsuario = {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Puntos',
                            data: puntos,
                            fill: false,
                            borderColor: 'rgb(0, 165, 142)',
                            lineTension: 0.1
                        }
                    ]
                };
 
                    var graphTarget = $("#graphCanvas");

                    var myChart = new Chart(graphTarget, {
                        type: 'bar',
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