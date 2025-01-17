@extends('layouts.app', [
'menu' => 'performance'
])

@section('page_style')
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
                    <label class="col-sm-2 col-form-label" for="data_inicio">Periodo</label>
                    <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="date" value="{{ isset($data['unidadesColetasDetalhes']['dataInicioPeriodoB'])?  \Carbon\Carbon::createFromFormat('d/m/Y', $data['unidadesColetasDetalhes']['dataInicioPeriodoB'])->format('Y-m-d'): '2018-01-01' }}"
                    id="data_inicio" name="data_inicio">
                    <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="date" value="{{ isset($data['unidadesColetasDetalhes']['dataFimPeriodoB'])?  \Carbon\Carbon::createFromFormat('d/m/Y', $data['unidadesColetasDetalhes']['dataFimPeriodoB'])->format('Y-m-d'): '2018-01-01' }}"
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
            <div class="card-header">Total de UC Nunca Venderam</div>
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
            <p>
                Diferença dos períodos A e B para cálculo da performance.<br/>O período A sempre equivale a mesma
                quantidade de dias que corresponde o Período B.
            </p>
        </div>

        <div class="alert alert-dark" role="alert" style="font-family: 'Lato';">
            <p>
                <strong>Total Período A: </strong> {{ number_format($data['unidadesColetasDetalhes']['totalPeriodoA'], 0, '', '.') }}
            </p>
            <p>
                <strong>Total Período B:</strong> {{ number_format($data['unidadesColetasDetalhes']['totalPeriodoB'], 0, '', '.') }}
            </p>
        </div><!-- ./alert alert-dark -->

        <div class="card bg-light mb-3  colorGelo boderTable">
            <div class="card-header">Performance Laboratório</div>
            <div class="card-body table-responsive">
                <table class="table table-hover font-12 table-sorter" id="table-listagem-leads" >
                    <thead>
                        <tr>
                            <th>Laboratório</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Executivo Psy</th>
                            <th>Executivo Pardini</th>
                            <th>Preço médio</th>
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
                            <td>
                                {{ $lab['nome_executivo_psy'] }}
                                {{ isset($lab['id_executivo_psy']) && $lab['id_executivo_psy'] > 0? '- id:' . $lab['id_executivo_psy']: '' }}
                            </td>
                            <td>
                                {{ $lab['nome_executivo_pardini'] }}
                                {{ isset($lab['id_executivo_pardini']) && $lab['id_executivo_pardini'] > 0? '- id:' . $lab['id_executivo_pardini']:'' }}
                            </td>
                            <td>{{ $lab['preco_medio'] }}</td>
                            <td>{{ $lab['quantidadePeriodoA'] }}</td>
                            <td>{{ $lab['quantidadePeriodoB'] }}</td>
                            <td>{{ $lab['variacao'] }}</td>
                            <td class="text-white {{ $lab['variacao'] > 0 ? 'bg-success' : 'bg-danger' }}">{{ $lab['variacaoPorcentual'] }}</td>
                            <td>{{ $lab['valor_exame_clt'] }}</td>
                            <td>{{ $lab['valor_exame_cnh'] }}</td>
                            <td>{{ $lab['data_ultimo_comentario'] }}</td>
                            <td>{{ $lab['nome_ultimo_comentario'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total:</strong></td>
                            <td><strong>{{ $data['unidadesColetasDetalhes']['totalPeriodoA'] }}</strong></td>
                            <td><strong>{{ $data['unidadesColetasDetalhes']['totalPeriodoB'] }}</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
            <div class="card-header title-Grafico">Laboratório sem Vendas nos últimos 10 dias</div>
            <div class="card-body table-responsive">
                <table class="table table-hover font-12 table-sorter">
                    <thead>
                        <tr>
                            <th>Laboratório</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Executivo Psy</th>
                            <th>Executivo Pardini</th>
                            <th>Dias sem Vender</th>
                            <th>Data Última Venda</th>
                            <th>Qtd Vendas 30 dias</th>
                            <th>Ultimo coment.</th>
                            <th>Nome Último Coment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['labsSemVendaDetail']['data'] as $lab)
                        <tr class=" {{ $lab['bg_color']  }}" >
                            <td>{{ $lab['nome_laboratorio'] }}</td>
                            <td>{{ $lab['cidade'] }}</td>
                            <td>{{ $lab['estado'] }}</td>
                            <td>{{ $lab['nome_executivo_psy'] }}</td>
                            <td>{{ $lab['nome_executivo_pardini'] }}</td>
                            <td>{{ $lab['dias_sem_vender'] }}</td>
                            <td>{{ $lab['data_ultima_venda'] }}</td>
                            <td>{{ $lab['qtd_vendas_trinta_dias'] }}</td>
                            <td>{{ $lab['data_ultimo_comentario'] }}</td>
                            <td>{{ $lab['nome_ultimo_comentario'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total:</strong></td>
                            <td><strong>{{ $data['labsSemVendaDetail']['total_vendas_trinta_dias'] }}</strong></td>
                            <td></td>
                            <td></td>
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
            <div class="card-body table-responsive">
                <table class="table table-hover font-12 table-sorter">
                    <thead>
                        <th>Laboratório</th>
                        <th>Cidade</th>
                        <th>Ultimo coment.</th>
                        <th>Nome Último Coment</th>
                    </thead>
                    <tbody>
                        @foreach($data['nuncaVenderamDetail']['data'] as $lab)
                        <tr class=" {{ $lab['bg_color']  }}" >
                            <td>{{ $lab['nome_laboratorio'] }}</td>
                            <td>{{ $lab['cidade'] }}</td>
                            <td>{{ $lab['data_ultimo_comentario'] }}</td>
                            <td>{{ $lab['nome_ultimo_comentario'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card bg-light mb-3  colorGelo boderTable">
            <div class="card-header">movidos para Exclusão</div>
            <div class="card-body">
                <table class="table table-hover font-12">
                    <thead>
                        <th>Laboratório</th>
                        <th>Cidade</th>
                    </thead>
                    <tbody>
                        @foreach($data['movidosExclusaoDetail']['data'] as $lab)
                        <tr class=" {{ $lab['bg_color']  }}" >
                            <td>{{ $lab['nome_laboratorio'] }}</td>
                            <td>{{ $lab['cidade'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


@section('page_scripts')
<script src="{{ asset('js/performance_lab.js') }}"></script>
<script type="text/javascript">
    inside.performance_lab.init();

    $('#data_inicio').datepicker({
        format: 'dd/mm/yyyy'
    });

    $('#data_fim').datepicker({
        format: 'dd/mm/yyyy'
    });
</script>
@endsection
