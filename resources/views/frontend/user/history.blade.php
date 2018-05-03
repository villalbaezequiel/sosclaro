@extends('layouts.frontend')

@section('title', "Historial de cuenta")
@section('content')

@include('frontend.components.header')         
<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Historial de cuenta</span>
        </hgroup>
        <article class="section-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="col col-md-6">
                        <h3>
                            <span class="badge badge-secondary">50 puntos</span>
                        </h3>
                        <span>Puntos disponibles para canjes</span>
                    </div>
                    <div class="col col-md-6">
                        <h3>
                            <span class="badge badge-secondary">128 históricos</span>
                        </h3>
                        <span>Puntos obtenidos desde la registración</span>
                    </div>
                </div>
            </div>
        </article>
        <article class="section-content">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Movimientos</strong>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Concepto</th>
                                <th scope="col">Puntos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>03/06/2018</td>
                                <td>Puntos obtenidos por completar encuesta</td>
                                <td>150</td>
                            </tr>
                            <tr>
                                <td>29/05/2018</td>
                                <td>Canje Cafetera Nespresso</td>
                                <td>(280)</td>
                            </tr>
                            <tr>
                                <td>28/05/2018</td>
                                <td>Puntos obtenidos por Ganador Mayo</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td>13/05/2018</td>
                                <td>Puntos obtenidos por completar encuesta</td>
                                <td>150</td>
                            </tr>
                            <tr>
                                <td>10/05/2018</td>
                                <td>Puntos obtenidos por completar perfil</td>
                                <td>150</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </article>
    </section>
</main>
@endsection