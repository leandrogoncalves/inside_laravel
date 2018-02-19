@extends('layouts.app', [
    'menu' => 'performance'
])
<link href="{{ asset('css/performance.css') }}" rel="stylesheet">
@section('content')

    <div id="page-title" class="d-flex mb-4">
        <h2 class="display-4">{{ ('Performance' . (isset(Auth::user()->perfil)? ' - ' . ucfirst(Auth::user()->perfil): '')) }}</h2>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card bg-light mb-3 colorGelo boderTable">
                <div class="card-header">Consulta de Periodos</div>
                <div class="card-body">
                    <form class="form-inline" method="POST" action="">
                        <label class="col-sm-2 col-form-label" for="inputPerido">Periodo</label>
                        <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="date" value="2011-08-19"
                               id="example-date-input">
                        <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="date" value="2011-08-19"
                               id="example-date-input2">
                        <button type="submit" class="btn btn-primary">Ok</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card bg-light mb-3 colorGelo boderTable">
                <div class="card-header">Legendas</div>
                <div class="panel-body">
                    <ul class="list-inline" style="text-align: center; top: 0px;">
                        <li class="list-inline-item list-group-item-info" style="padding: 25px; border-radius: 10px;">LC Psychemedics</li>
                        <li class="list-inline-item list-group-item-danger" style="padding: 25px; border-radius: 10px;">LC Rede Pardini</li>
                        <li class="list-inline-item list-group-item-warning" style="border-radius: 10px; padding: 25px;">LC Pardini Log. Psy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card bg-light mb-3 colorGelo boderTable">
                <div class="card-header">Total de UC com Venda</div>
                <div class="card-body">
                    <strong><p style="text-align: center"> 0</p></strong>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-light mb-3 colorGelo boderTable">
                <div class="card-header">Total de UC sem Venda</div>
                <div class="card-body">
                    <strong> <p style="text-align: center"> 0</p></strong>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-light mb-3 colorGelo boderTable">
                <div class="card-header">Total de UC Nunca Venda</div>
                <div class="card-body">
                   <strong> <p style="text-align: center"> 0</p></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card bg-light mb-3  colorGelo boderTable">
                <div class="card-header">Performance Laboratório</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Laboratório</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Periodo A</th>
                            <th>Periodo B</th>
                            <th>Variação</th>
                            <th>Variação %</th>
                            <th>Valor Exame</th>
                            <th>Ultimo Coment.</th>
                            <th>Nome Último Coment</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3"><strong>Total:</strong></td>
                            <td><strong>1692</strong></td>
                            <td><strong>1750</strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card bg-light mb-3  colorGelo boderTable">
                <div class="card-header title-Grafico">Laboratório sem Vendas</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Laboratório</th>
                            <th>Cidade</th>
                            <th>Executivo</th>
                            <th>Dias sem Vender</th>
                            <th>Data Última Venda</th>
                            <th>Qtd Vendas 30 dias</th>
                            <th>Ultimo coment.</th>
                            <th>Nome Último Coment</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3"><strong>Total:</strong></td>
                            <td><strong>1168</strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card bg-light mb-3  colorGelo boderTable">
                <div class="card-header">Nunca Venderam</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <th>Laboratório</th>
                        <th>Cidade</th>
                        <th>Ultimo coment.</th>
                        <th>Nome Último Coment</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card bg-light mb-3  colorGelo boderTable">
                <div class="card-header">movidos para Exclusão</div>
                <div class="card-body">
                    <table class="table table-hover ">
                        <thead>
                        <th>Laboratório</th>
                        <th>Cidade</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
