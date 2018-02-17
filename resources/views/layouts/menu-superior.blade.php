<nav class="navbar navbar-dark bg-dark mb-3">
    <div class="container">
        <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item mr-1 {{ $menu == 'home'? 'active':null }}">
                <a href="{{ route('home') }}" class="nav-link">Home {!! $menu == 'home'? '<span class="sr-only">(current)</span>':null !!}</a>
            </li>
            <li class="nav-item mr-2 {{ $menu == 'performance'? 'active':null }}">
                <a href="#" class="nav-link">Performance {!! $menu == 'performance'? '<span class="sr-only">(current)</span>':null !!}</a>
            </li>
        </ul>
    </div>
</nav>
