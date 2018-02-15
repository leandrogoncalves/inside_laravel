<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Services\UsuarioLogadoService;
use Inside\Services\SolicitacoesExames\TotalExames;
use Carbon\Carbon;

class HomeService
{
    private $usuarioLogadoService;
    private $totalExames;

    public function __construct(UsuarioLogadoService $usuarioLogadoService, TotalExames $totalExames)
    {
        $this->usuarioLogadoService = $usuarioLogadoService;
        $this->totalExames = $totalExames;
    }

    public function getData(Request $request)
    {
        $user = $this->usuarioLogadoService->getUsuarioLogadoData($request);
        $dates = $this->getExamesDaysDate();

        $key1 = "total-exames-" . $dates["startPeriodOne"]->format("d-m-Y");
        $key2 = "total-exames-" . $dates["startPeriodTwo"]->format("d-m-Y");
        $key3 = "total-exames-" . $dates["startPeriodThree"]->format("d-m-Y");

        return [
            $key1 => $this->totalExames->getTotalExamesSolicitados($dates["startPeriodOne"], $dates["finishPeriodOne"], $user),
            $key2 => $this->totalExames->getTotalExamesSolicitados($dates["startPeriodTwo"], $dates["finishPeriodTwo"], $user),
            $key3 => $this->totalExames->getTotalExamesSolicitados($dates["startPeriodThree"], $dates["finishPeriodThree"], $user),
        ];
    }

    private function getExamesDaysDate()
    {
        $now = Carbon::now();
        $now = Carbon::createFromFormat("Y-m-d H:i:s", "2018-02-09 00:00:00");

        return collect([
            "startPeriodOne" => $now->copy()->addDays(0)->hour(0)->minute(0)->second(0),
            "finishPeriodOne" => $now->copy()->addDays(0)->hour(23)->minute(59)->second(59),
            "startPeriodTwo" => $now->copy()->addDays(-1)->hour(0)->minute(0)->second(0),
            "finishPeriodTwo" => $now->copy()->addDays(-1)->hour(23)->minute(59)->second(59),
            "startPeriodThree" => $now->copy()->addDays(-2)->hour(0)->minute(0)->second(0),
            "finishPeriodThree" => $now->copy()->addDays(-2)->hour(23)->minute(59)->second(59),
        ]);
    }
}
