<?php

namespace Inside\Domain\VendasUnidadesColetas;

use Inside\Domain\VendasUnidadesColetas\ComVenda\UnidadesColetasComVenda;

use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Executivos;
use Carbon\Carbon;
use \DB;

class VendasUnidadesColetas
{
    private $executivos;
    private $unidadesColetasComVenda;

    public function __construct(Executivos $executivos, UnidadesColetasComVenda $unidadesColetasComVenda)
    {
        $this->executivos = $executivos;
        $this->unidadesColetasComVenda = $unidadesColetasComVenda;
    }

    public function get(UsuarioLogado $user)
    {
        $idExecutivo = $this->executivos->getIdExecutivo($user);
        $dataInicio = Carbon::now()->copy()->subMonth(1)->hour(0)->minute(0)->second(0);
        $dataFim = Carbon::now()->copy()->hour(23)->minute(59)->second(59);

        dd($this->unidadesColetasComVenda->getUnidadesColetasPsy($dataInicio, $dataFim, $idExecutivo));
    }
}
