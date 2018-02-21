@extends('layouts.app', [
    'menu' => 'acesso'
])

@section('page_style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link href="{{ asset('css/performance.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div id="page-title" class="d-flex mb-4">
        <h2 class="display-4">{{ ('Acesso' . (isset(Auth::user()->perfil)? ' - ' . ucfirst(Auth::user()->perfil): '')) }}</h2>
    </div>
    <div class="card bg-light mb-3  colorGelo boderTable">
        <div class="card-header">Detalhes dos Acessos</div>
        <div class="card-body">
            <table class="table table-hover" id="table-listagem-leads">
                <thead>
                <tr>
                    <th>Usúario</th>
                    <th>Último Acesso</th>
                    <th>Perfil de Acesso
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $user)
                    <tr>
                        <td>{{ $user['nome'] }}</td>
                        <td>{{ !empty($user['ultimo_acesso']) ? $user['ultimo_acesso']: 'Não Disponível' }}</td>
                        <td>{{ $user['perfil_acesso'] }}</td>
                        <td><a href="acesso/" class="btn btn-primary">Acessar como {{$user['nome']}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


