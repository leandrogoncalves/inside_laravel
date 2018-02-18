<nav class="navbar navbar-light nav-back colorGelo  mb-3">
    <div class="container">
        <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item mr-1">
                <a class="navbar-brand panel-logo" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo-psy2.png') }}" alt="psychemedics logo">
                </a>
                <!--
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                -->
            </li>
            <li class="nav-item mr-2 {{ $menu == 'home'? 'active':null }}">
                <a href="{{ route('home') }}" data-toggle="tooltip"  class="nav-link">Home {!! $menu == 'home'? '<span class="sr-only">(current)</span>':null !!}</a>
            </li>
            <li class="nav-item mr-3 {{ $menu == 'performance'? 'active':null }}">
                <a href="#" data-toggle="tooltip"  class="nav-link">Performance {!! $menu == 'performance'? '<span class="sr-only">(current)</span>':null !!}</a>
            </li>
        </ul>
        @include('layouts.header')
    </div>
</nav>
