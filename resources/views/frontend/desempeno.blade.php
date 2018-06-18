@extends('layouts.frontend')

@section('title', "Desempeño")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Desempeño</span>
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
                                    {{ $ultimo_desempeno[0]->promedio }}
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
                                            <th scope="col">Promedio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_desempeno as $desempenos)
                                            <tr>
                                                <td>{{ \App\Functions::getDate($desempenos->created_at) }}</td>
                                                <td>{{ $desempenos->indicador_1 }}</td>
                                                <td>{{ $desempenos->indicador_2 }}</td>
                                                <td>{{ $desempenos->promedio }}</td>
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