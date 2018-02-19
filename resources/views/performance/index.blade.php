@extends('layouts.app', [
    'menu' => 'performance'
])

@section('page_style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link href="{{ asset('css/performance.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div id="page-title" class="d-flex mb-4">
        <h2 class="display-4">{{ ('Performance' . (isset(Auth::user()->perfil)? ' - ' . ucfirst(Auth::user()->perfil): '')) }}</h2>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card bg-light mb-3 colorGelo boderTable">
                <div class="card-header">Consulta de Periodos</div>
                <div class="card-body">
                    <form class="form-inline" method="POST" action="{{ route('performance') }}">
                        @csrf
                        <label class="col-sm-2 col-form-label" for="data_inicio">Período B</label>
                        <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="date" value="2011-08-19"
                               id="data_inicio" name="data_inicio">
                        <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="date" value="2011-08-19"
                               id="data_fim" name="data_fim">
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
                        <li class="list-inline-item list-group-item-info legenda">LC Psychemedics</li>
                        <li class="list-inline-item list-group-item-danger legenda">LC Rede Pardini</li>
                        <li class="list-inline-item list-group-item-warning legenda">LC Pardini Log. Psy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card bg-light mb-3 colorGelo boderTable">
                <div class="card-header">Preço médio</div>
                <div class="card-body">
                    <strong><p style="text-align: center">{{ $data['precoMedio']['precoMedio'] }}</p></strong>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-light mb-3 colorGelo boderTable">
                <div class="card-header">Total de UC com Venda</div>
                <div class="card-body">
                    <strong><p style="text-align: center">{{ $data['unidadesColetasComVenda'] }}</p></strong>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-light mb-3 colorGelo boderTable">
                <div class="card-header">Total de UC sem Venda</div>
                <div class="card-body">
                    <strong> <p style="text-align: center">{{ $data['unidadesColetasSemVenda'] }}</p></strong>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-light mb-3 colorGelo boderTable">
                <div class="card-header">Total de UC Nunca Venda</div>
                <div class="card-body">
                   <strong> <p style="text-align: center">{{ $data['unidadesColetasNuncaVenderam'] }}</p></strong>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="alert alert-info" role="alert">
                <strong>ATENÇÃO:</strong> Caso não encontre algum laboratório ou algum laboratório está
                sem venda e você tem conhecimento que ele efetuou vendas,
                por favor, entre em contato o seu regional para que possamos ajustar o vinculo dos Códigos Pardini com os
                Códigos Psy.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="alert alert-info" role="alert">
                <p>Diferença dos períodos A e B para cálculo da performance.<br/>O período A sempre equivale a mesma
                    quantidade de dias que corresponde o Período B.</p>
            </div>

            <div class="card bg-light mb-3  colorGelo boderTable">
                <div class="card-header">Performance Laboratório</div>
                <div class="card-body">
                    <table class="table table-hover" id="table-listagem-leads">
                        <thead>
                        <tr>
                            <th>Laboratório</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Periodo A</th>
                            <th>Periodo B</th>
                            <th>Variação</th>
                            <th>Variação %</th>
                            <th>Valor Exame CLT</th>
                            <th>Valor Exame CNH</th>
                            <th>Ultimo Coment.</th>
                            <th>Nome Último Coment</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data['unidadesColetasDetalhes']['data'] as $lab)
                                <tr class=" {{ $lab['bg_color']  }}" >
                                    <td>{{ $lab['nome_laboratorio'] }}</td>
                                    <td>{{ $lab['cidade'] }}</td>
                                    <td>{{ $lab['estado'] }}</td>
                                    <td>{{ $lab['quantidadePeriodoA'] }}</td>
                                    <td>{{ $lab['quantidadePeriodoB'] }}</td>
                                    <td>{{ $lab['variacao'] }}</td>
                                    <td class="text-white {{ $lab['variacao'] > 0 ? 'bg-success' : 'bg-danger' }}">{{ $lab['variacaoPorcentual'] }}%</td>
                                    <td>{{ $lab['valor_exame_clt'] }}</td>
                                    <td>{{ $lab['valor_exame_cnh'] }}</td>
                                    <td>{{ $lab['data_ultimo_comentario'] }}</td>
                                    <td>{{ $lab['nome_ultimo_comentario'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3"><strong>Total:</strong></td>
                            <td><strong>{{ $data['unidadesColetasDetalhes']['totalPeriodoA'] }}</strong></td>
                            <td><strong>{{ $data['unidadesColetasDetalhes']['totalPeriodoB'] }}</strong></td>
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


@section('page_scripts')
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-listagem-leads').DataTable({
                language: {
                    processing:     "Aguarde Processando...",
                    search:         "Buscar:",
                    lengthMenu:     "Mostrar _MENU_ linhas",
                    info:           "Mostrando  _START_ de _END_ - total: _MAX_ leads",
                    infoEmpty:      "Mostrando  _START_ de _END_ - total: _TOTAL_ leads",
                    infoFiltered:   " ",
                    infoPostFix:    "",
                    loadingRecords: "Aguarde carregando...",
                    zeroRecords:    "Nenhum registro encontrado",
                    emptyTable:     "Nenhum registro encontrado",
                    paginate: {
                        first:      "Primeiro",
                        previous:   "Anterior",
                        next:       "Próximo",
                        last:       "Último"
                    },
                    aria: {
                        sortAscending:  ": Ordenar crescentet",
                        sortDescending: ": Ordenar decrescente"
                    },
                    decimal: ","
                }
            });
        } );
    </script>
@endsection
