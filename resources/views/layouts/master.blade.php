<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Inside - Psychemedics">
    <meta name="author" content="Psychemedics">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Psychemedics</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/inside.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
        <script src="{{ asset('js/vendor/html5shiv/html5shiv.js') }}"></script>
        <script src="{{ asset('js/vendor/respond/respond.js') }}"></script>
    <![endif]-->


    <script>
        var PATH_SITE = '/';
    </script>
</head>
<body>

<div class="header">

    <div class="row">
        <div class="col-md-3 panel-logo">
            <a href="/"><img alt="psychemedics logo" src="{{ asset('images/logo-psy.jpg') }}" style=""></a>
        </div>

        <div class="col-md-5">
            <div class="row">

                <?php /* ?>
                @foreach( Session::get('usuario')->getTrimestre() as $trimestre)
                    <div class="col-md-3 text-center">
                        <a href="/trimestre?t={!! $trimestre->trimestre !!}">
                            {!! $trimestre->trimestre !!}
                            <br/>
                            {!! $trimestre->total !!}
                        </a>
                        <span class="glyphicon glyphicon-question-sign" data-toggle="modal"
                              data-target="#myModalTrimestre" aria-hidden="true"></span>
                    </div>
                @endforeach

                @if( isset($tendencia) && $tendencia )
                    <div class="col-md-3 text-center">
                        <a href="">
                            Tendência de vendas
                            <br>
                            {!! $tendencia !!}
                        </a>
                        <span class="glyphicon glyphicon-question-sign" data-toggle="modal"
                              data-target="#myModalTendencia" aria-hidden="true"></span>
                    </div>
                @endif
                <?php */ ?>

            </div>
            <!-- /row -->
        </div>
        <!-- /col -->


        <?php /* ?>
        <div class="col-md-4 text-right">
            @if(Session::has('usuario'))
                <p>Olá, <strong>{{ Session::get('usuario')->nome }}</strong>.
                    <a href="/minha-conta" class="inline">Minha Conta</a> | <a href="/logout" class="inline">Sair</a></p>
                <p><span class='bloco' style='background-color: #1b9e77; '></span> Solicitações <span class='bloco' style="background-color: rgb(51, 102, 204);"></span>
                    Coletas </p>
            @endif
        </div>

        <?php */ ?>

    </div>
    <!-- /row -->

</div>
<!-- /header -->

<?php /* ?>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

        <li class="{{ $menu == 'home' ? 'active' : '' }}"><a href="/">Home</a></li>
        <li class="{{ $menu == 'performance' ? 'active' : '' }}"><a
                    href="/performance{{ $url }}">Performance</a></li>
        <li class="{{ $menu == 'evolucao' ? 'active' : '' }}"><a href="/evolucao{{ $url }}">Evolução</a></li>
        <li class="{{ $menu == 'comparacao' ? 'active' : '' }}"><a href="/comparacao{{ $url }}">Comparação</a>
        </li>
        <li class="{{ $menu == 'prazos' ? 'active' : '' }}"><a href="/prazos{{ $url }}">Prazos</a></li>
        <li class="{{ $menu == 'grafico' ? 'active' : '' }}"><a href="/grafico{{ $url }}">Gráficos</a></li>
        <li class="{{ $menu == 'sugestao' ? 'active' : '' }}"><a href="/sugestao{{ $url }}">Sugestão</a></li>

        @if( in_array( Session::get('usuario')->perfil_acesso, array('admin', 'psy', 'ger-psy', 'sup-psy') ) )
            <li class="{{ $menu == 'comentarios' ? 'active' : ''}}"><a href="/comentarios{{ $url }}">Comentários</a></li>
            <li class="{{ $menu == 'relatorio-aceite' ? 'active' : ''}}"><a href="/relatorio-aceite">Relatório de Aceite </a></li>
        @endif

        @if( in_array( Session::get('usuario')->perfil_acesso, array('admin', 'psy', 'ger-psy', 'sup-psy', 'exec-psy') ) )
            <li class="{{ $menu == 'novos-clientes' ? 'active' : ''}}"><a href="/novos-clientes">Novos clientes</a></li>
        @endif

        @if( !in_array(Session::get('usuario')->perfil_acesso, array('admin-pard', 'executivo', 'gerente', 'supervisor') ) )
            <li class="{{ $menu == 'exibicao-site' ? 'active' : ''}}"><a href="/exibicao-site">Exibição Site <sup style="color: red;">Novo</sup></a></li>
        @endif

        @if( in_array(Session::get('usuario')->perfil_acesso, array('admin', 'ger-psy', 'sup-psy') ) || Session::get('usuario')->perfil_acesso == 'admin-pard' )
            <li class="{{ $menu == 'acessos' ? 'active' : ''}}"><a href="/acessos{{ $url }}">Acessos</a></li>
        @endif

        ?>
    </ul>
</div>
<!-- /.navbar-collapse -->

<?php */ ?>


<div class="container-fluid">

    @yield('content')

    <!-- Modal -->
    @include('_modal.modal_tendencia')
    @include('_modal.modal_trimestre')

</div>
<!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.jss"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" ></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.4/datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/locale/pt-br.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.4/i18n/datepicker.pt-BR.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vendor/jquery/jquery.mask.js') }}"></script>
<script src="{{ asset('js/vendor/jquery/jquery.tablesorter.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery/jquery.twbsPagination.min.js') }}" ></script>
<script src="{{ asset('js/pages.js') }}" ></script>

@yield('js')


</body>
</html>


