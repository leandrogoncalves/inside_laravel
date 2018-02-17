<?php

namespace Inside\Services;

use Illuminate\Http\Request;
use Inside\Services\UsuarioLogadoService;
use Inside\Domain\SolicitacoesExames\TotalExames;
use Inside\Domain\PrecoMedio\PrecoMedio;
use Inside\Domain\TotalExamesAgrupadosMes\TotalExamesAgrupadosMes;
use Carbon\Carbon;
use Inside\Transformers\TotalExamesSolicitadosTransformer;

class HomeService
{
    private $usuarioLogadoService;
    private $totalExames;
    private $precoMedio;
    private $totalExamesAgrupadosMes;

    public function __construct(UsuarioLogadoService $usuarioLogadoService, TotalExames $totalExames, PrecoMedio $precoMedio, TotalExamesAgrupadosMes $totalExamesAgrupadosMes)
    {
        $this->usuarioLogadoService = $usuarioLogadoService;
        $this->totalExames = $totalExames;
        $this->precoMedio = $precoMedio;
        $this->totalExamesAgrupadosMes = $totalExamesAgrupadosMes;
    }

    public function getData(Request $request)
    {
        $user = $this->usuarioLogadoService->getUsuarioLogadoData($request);
        $dates = $this->getExamesDaysDate();

        $data = collect([]);

        $periodOne = $this->totalExames->getTotalExamesSolicitados($dates["startPeriodOne"], $dates["finishPeriodOne"], $user);
        $periodTwo = $this->totalExames->getTotalExamesSolicitados($dates["startPeriodTwo"], $dates["finishPeriodTwo"], $user);
        $periodThree = $this->totalExames->getTotalExamesSolicitados($dates["startPeriodThree"], $dates["finishPeriodThree"], $user);

        $precoMedio = $this->precoMedio->getPrecoMedio($user);
        $totalExamesAgrupadosMes = $this->totalExamesAgrupadosMes->get($user);

        $data->put('periodo1', $periodOne);
        $data->put('periodo2', $periodTwo);
        $data->put('periodo3', $periodThree);

        $transformer = new TotalExamesSolicitadosTransformer();
        $data = $transformer->transform($data);

        return ['data' => $data, 'precoMedio' => $precoMedio, 'grafico' => $totalExamesAgrupadosMes->toJson()];
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
