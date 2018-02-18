<?php

namespace Inside\Domain\TotaisUnidadeColeta;

use Illuminate\Http\Request;
use Inside\Domain\UsuarioLogado;
use Inside\Domain\Executivos\Executivos;
use Inside\Repositories\Contracts\TotaisUnidadeColetaRepository;
use Carbon\Carbon;
use Illuminate\Log\Logger;


class TotaisUnidadeColeta
{
    private $executivos;
    private $usuarioLogado;
    private $dataInicio;
    private $dataFim;
    private $log;

    public function __construct(Executivos $executivos,  Logger $log)
    {
        $this->executivos = $executivos;
        $this->log = $log;
    }

    public function setUser(UsuarioLogado $usuarioLogado)
    {
        $this->usuarioLogado = $usuarioLogado;
    }

    public function setPeriodo(Request $request)
    {
        try{
            $dataInicio = $request->input('data_inicio',null);
            $dataFim = $request->input('data_fim',null);

            $this->dataInicio = empty($dataInicio) ? Carbon::now()->subDay(30) : Carbon::createFromFormat('d/m/Y',$dataInicio);
            $this->dataFim = empty($dataFim) ? Carbon::now() : Carbon::createFromFormat('d/m/Y',$dataFim);
        } catch (\Exception $e){
            $this->log->error('[Domain TotaisUnidadeColeta] erro ao setar período, detalhes = '.$e->getMessage());
            $this->log->error('[Domain TotaisUnidadeColeta] file = '.$e->getFile() . ':'.$e->getLine());
            $this->log->error('[Domain TotaisUnidadeColeta] trace = '.$e->getTraceAsString());
            return $e;
        }
    }

    public function totalComVenda()
    {
        $laboratoriosUsuario = $this->usuarioLogado->idLaboratorios();

        dd($laboratoriosUsuario);
    }

    public function totalSemVenda()
    {

    }

    public function totalNuncaVendeu()
    {

    }
}