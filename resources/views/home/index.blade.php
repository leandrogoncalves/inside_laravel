@extends('layouts.app', [
    'menu' => 'home'
])

@section('content')

<div id="page-title" class="d-flex mb-4">
    <h2 class="display-4">{{ ('Dashboard' . (isset(Auth::user()->perfil)? ' - ' . ucfirst(Auth::user()->perfil): '')) }}</h2>
</div>

<div class="row">
    @foreach($data as $periodo) <!-- PRIMEIRO VAMOS PERCORRER ENTRE OS PERIODOS -->
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card bg-light mb-3">
            <div class="card-header">Total de Exames Solicitados em: {{ $periodo["periodo"] }}</div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Origem</th>
                            <th>Quantidade</th>
                            <th>%/QTD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- AGORA VAMOS PERCORRER ENTRE AS ORIGENS (MACRO) -->

                        @foreach($periodo as $origens)
                        @if (!$origens instanceof \Illuminate\Support\Collection)
                            @continue;
                        @endif

                        <!-- AGORA VAMOS PERCORRER ENTRE AS ORIGENS (MICRO) -->
                        @foreach($origens as $origem)
                        <tr>

                            <td>{{ $origem["origem"]["alias"] }}</td>
                            <td>{{ $origem["origem"]["total"] }}</td>
                            <td>{{ $origem["origem"]["porcentualTotal"] }}</td>

                        </tr>
                        @endforeach
                        @endforeach <!-- FIM DO FOREACH ENTRE TODAS AS ORIGENS -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Total:</strong></td>
                            <td><strong>{{ $periodo["totalExamesPorPeriodo"] }}</strong></td>
                            <td><strong>{{ $periodo["totalExamesPorPeriodoPorcentagem"] . "%" }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @endforeach <!-- FIM DE UM CARD COM O PERIODO -->
</div>

<div class="row">
    <div class="col d-flex justify-content-center">
        <div class="card bg-light mb-3">
            <div class="card-header">Preço Médio:</div>
            <div class="card-body">
                <p class="card-text">{{ $precoMedio["precoMedio"] }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
