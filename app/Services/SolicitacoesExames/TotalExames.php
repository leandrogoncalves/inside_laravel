<?php

namespace Inside\Services\SolicitacoesExames;

use Inside\Services\SolicitacoesExames\Psy\Executivos;
use Inside\Services\SolicitacoesExames\Pardini\Executivos as ExecutivosPardini;

use Inside\Repositories\Contracts\LaboratorioRepository;
use Inside\Repositories\Contracts\FormularioRepository;

use Inside\Models\Formulario;

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
        $idExecutivoPsy = $this->executivoRepository->getIdExecutivoByCodigoGerente();

        return $this->formularioRepository
        ->with(["laboratorio"])
        ->whereHas("laboratorio", function ($query) use ($idExecutivoPsy) {
            $query->whereIn('id_executivo_psy', $idExecutivoPsy);
        })
        ->first();
    }
}
