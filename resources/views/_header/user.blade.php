<div class="col-md-4 text-right">
    <p>Olá, <strong>{{ Auth::user()->nome }}</strong>.
        <a href="/minha-conta" class="inline">Minha Conta</a>
        | <a href="/logout" class="inline">Sair</a>
    </p>
    <p>
        <span class='bloco' style='background-color: #1b9e77; '></span> Solicitações
        <span class='bloco' style="background-color: rgb(51, 102, 204);"></span>  Coletas
    </p>
</div>
