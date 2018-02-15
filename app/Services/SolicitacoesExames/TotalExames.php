<?php

namespace Inside\Services\SolicitacoesExames;

use Inside\Services\SolicitacoesExames\Psy\Executivos;
use Inside\Services\SolicitacoesExames\Pardini\Executivos as ExecutivosPardini;

use Inside\Repositories\Contracts\LaboratorioRepository;
use Inside\Repositories\Contracts\FormularioRepository;

class TotalExames
{
    private $laboratorioRepository;
    private $formularioRepository;
    private $executivoRepository;
    private $executivoPardiniRepository;

    public function __construct(Executivos $executivoRepository, ExecutivosPardini $executivoPardiniRepository, LaboratorioRepository $laboratorioRepository, FormularioRepository $formularioRepository)
    {
        $this->laboratorioRepository = $laboratorioRepository;
        $this->formularioRepository = $formularioRepository;
        $this->executivoRepository = $executivoRepository;
        $this->executivoPardiniRepository = $executivoPardiniRepository;
    }

    public function getTotalExamesSolicitados()
    {
        $this->formularioRepository->with([
            "laboratorio" => function ($query) {
                return $query->where("PesPesLabAuto", 3518)->get();
            }
            ])->first();
    }
}
