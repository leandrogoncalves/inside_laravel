<?php

namespace Inside\Http\Controllers\Api;

use Illuminate\Http\Request;
use Inside\Http\Controllers\Controller;
use Inside\Services\HomeService;

class HomeController extends Controller
{
    private $service;

    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }


    public function getQuadrosTotais(Request $request)
    {

    }

    public function index(Request $request)
    {
        try {
            $data = $this->service->getData($request);
            return response()->json($data);
        } catch (\Exception $e) {
            \Log::error('[API INSIDE HOME] Erro ao acessar quadros totais, detalhes = '.$e->getMessage());
            \Log::error('[API INSIDE HOME] File = '.$e->getFile().': '.$e->getLine());
            \Log::error('[API INSIDE HOME] Trace = '.$e->getTraceAsString());
            return response()->json($e->getMessage(), ($e->getCode() > 200? $e->getCode() : '404'));
        }

    }

}
