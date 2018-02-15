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

                @if(Auth::check())
                    @include('_header.indicadores',compact($menu))
                @endif

            </div>
            <!-- /row -->
        </div>
        <!-- /col -->


        @if(Auth::check())
            @include('_header.user',compact($menu))
        @endif

    </div>
    <!-- /row -->

</div>
<!-- /header -->

<div class="container-fluid">

    @if(Auth::check())
        @include('_header.menu',compact($menu))
    @endif

    @yield('content')

    <!-- Modal -->
    @include('_modal.modal_tendencia')
    @include('_modal.modal_trimestre')

</div>
<!-- /container-fluid -->

<!-- Bootstrap core JavaScript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

@yield('js')

</body>
</html>