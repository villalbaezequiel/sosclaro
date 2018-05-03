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
                        <span class="badge badge-danger">180 puntos</span>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row card-text">
                        <div class="col-md-6">
                            <h1 class="mb-0">
                                <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> 80%</h1>
                        </div>
                        <div class="col-md-6 text-left">
                            <h6>
                                <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> 100% Indicador 1</h6>
                            <h6>
                                <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> 60% Indicador 2</h6>
                        </div>
                    </div>
                </div>
                <div class="card-footer">Datos para la semana del 14/03/2018</div>
            </div>
        </article>
        <article class="section-content">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Ganadores</strong>
                </div>
                <div class="card-body">
                    <form class="row text-center">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="selectDesempenoMes">Mes</label>
                                <select class="form-control" id="selectDesempenoMes">
                                    <option>Diciembre</option>
                                    <option>Noviembre</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="selectDesempenoRegion">Región</label>
                                <select class="form-control" id="selectDesempenoRegion">
                                    <option>Nacional</option>
                                    <option>Patagónia</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Puesto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puntos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Guido Kilback</td>
                                <td>90034</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Cassandra Kohler</td>
                                <td>79240</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Ethyl Skiles</td>
                                <td>61176</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Ashlynn Senger</td>
                                <td>90034</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Ramona VonRueden</td>
                                <td>79240</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Ashlee Powlowski</td>
                                <td>61176</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Mayra Pfannerstill</td>
                                <td>90034</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Jean Schultz</td>
                                <td>79240</td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>Lou Collier</td>
                                <td>61176</td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>Bridie Senger</td>
                                <td>90034</td>
                            </tr>
                            <tr>
                                <th scope="row">11</th>
                                <td>Josiane Fisher</td>
                                <td>90034</td>
                            </tr>
                            <tr>
                                <th scope="row">12</th>
                                <td>Cole Davis</td>
                                <td>79240</td>
                            </tr>
                            <tr>
                                <th scope="row">13</th>
                                <td>Floy Fadel</td>
                                <td>61176</td>
                            </tr>
                            <tr>
                                <th scope="row">...</th>
                                <td>Shaun Bergnaum</td>
                                <td>61176</td>
                            </tr>
                            <tr>
                                <th scope="row">20</th>
                                <td>Laurel Ziemann</td>
                                <td>61176</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </article>
    </section>
</main>
@endsection