<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('page_style')

    <!-- Script-->
</head>
<body>
    <div id="app" style="height:100vH;">

        @if(isset($menu))
        @include('layouts.menu-superior', ['menu' => $menu])
        @endif

        <main class="h-100 ml-4 mr-4" >
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    @stack('scripts')

    @yield('page_scripts')
</body>
</html>
