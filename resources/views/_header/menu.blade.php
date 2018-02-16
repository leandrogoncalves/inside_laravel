<nav class="navbar navbar-expand-sm navbar-light bg-faded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav-content">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ $menu == 'home' ? 'active' : '' }}" href="/">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $menu == 'performance' ? 'active' : '' }}" href="/performance">Performance</a>
            </li>
            <?php /*  ?>
            <li class="{{ $menu == 'evolucao' ? 'active' : '' }}"><a href="/evolucao">Evolução</a></li>
            <li class="{{ $menu == 'comparacao' ? 'active' : '' }}"><a href="/comparacao">Comparação</a></li>
            <li class="{{ $menu == 'prazos' ? 'active' : '' }}"><a href="/prazos">Prazos</a></li>
            <li class="{{ $menu == 'grafico' ? 'active' : '' }}"><a href="/grafico">Gráficos</a></li>
            <li class="{{ $menu == 'sugestao' ? 'active' : '' }}"><a href="/sugestao">Sugestão</a></li>

            @if( in_array( $perfil_acesso, array('admin', 'psy', 'ger-psy', 'sup-psy') ) )
                <li class="{{ $menu == 'comentarios' ? 'active' : ''}}"><a href="/comentarios{{ $url }}">Comentários</a></li>
                <li class="{{ $menu == 'relatorio-aceite' ? 'active' : ''}}"><a href="/relatorio-aceite">Relatório de Aceite </a></li>
            @endif

            @if( in_array( $perfil_acesso, array('admin', 'psy', 'ger-psy', 'sup-psy', 'exec-psy') ) )
                <li class="{{ $menu == 'novos-clientes' ? 'active' : ''}}"><a href="/novos-clientes">Novos clientes</a></li>
            @endif

            @if( !in_array( $perfil_acesso, array('admin-pard', 'executivo', 'gerente', 'supervisor') ) )
                <li class="{{ $menu == 'exibicao-site' ? 'active' : ''}}"><a href="/exibicao-site">Exibição Site <sup style="color: red;">Novo</sup></a></li>
            @endif

            @if( in_array( $perfil_acesso, array('admin', 'ger-psy', 'sup-psy') ) || $perfil_acesso == 'admin-pard' )
                <li class="{{ $menu == 'acessos' ? 'active' : ''}}"><a href="/acessos{{ $url }}">Acessos</a></li>
            @endif

            <?php */ ?>
        </ul>
    </div>
    <!-- /navbar-collaps -->

</nav>


<!-- /.navbar-collapse -->
