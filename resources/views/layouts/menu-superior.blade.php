<nav class="navbar navbar-light nav-back colorGelo  mb-3">
        <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item mr-1">
                <a class="navbar-brand panel-logo" href="{{ url('/') }}">
                    <img src="{{ asset('images/psy-logo.png') }}" alt="psychemedics logo">
                </a>
                <!--
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                -->
            </li>
            <li class="nav-item nav-hover  mr-2 {{ $menu == 'home'? 'active':null }}">
                <a href="{{ route('home') }}" data-toggle="tooltip"  class="nav-link">Home {!! $menu == 'home'? '<span class="sr-only">(current)</span>':null !!}</a>
            </li>
            <li class="nav-item nav-hover mr-3 {{ $menu == 'performance'? 'active':null }}">
                <a href="{{ route('performance') }}" class="nav-link">Performance {!! $menu == 'performance'? '<span class="sr-only">(current)</span>':null !!}</a>
            </li>
            @can('ver-acessos', app('request'))
            <li class="nav-item nav-hover mr-4 {{ $menu == 'Acesso'? 'active':null }}">
                <a href="{{ route('acesso') }}" class="nav-link">Acesso {!! $menu == 'acesso'? '<span class="sr-only">(current)</span>':null !!}</a>
            </li>
            @endcan
        </ul>
        @include('layouts.header')
</nav>
