@extends('layouts.frontend')

@section('title', "Desempeño")
@section('content')

@include('frontend.components.header')

<main class="main main-user">
    <section class="section-wrapper">
        <hgroup class="section-header">
            <span class="title">Ranking</span>
        </hgroup>
        <article class="section-content">
            <div class="card text-center">
                <div class="card-header">
                    <h4>Tienes acumulados
                        <span class="badge badge-danger">320 puntos</span> históricos</h4>
                </div>
                <div class="card-body">
                    <div class="row card-text">
                        <div class="col col-md-6">
                            <h3>
                                <span class="badge badge-secondary">Puesto 37</span>
                            </h3>
                            <p>Posición para la región:
                                <strong>Patagónica</strong>
                            </p>
                        </div>
                        <div class="col col-md-6">
                            <h3>
                                <span class="badge badge-secondary">Puesto 128</span>
                            </h3>
                            <p>Posición para la región:
                                <strong>Nacional</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="section-content">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Posiciones por región</strong>
                </div>
                <div class="card-body">
                    <form class="text-center">
                        <div class="form-group">
                            <select class="form-control" id="selectDesempenoRegion">
                                <option>Nacional</option>
                                <option>Patagónia</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
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
                                <th scope="row">50</th>
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