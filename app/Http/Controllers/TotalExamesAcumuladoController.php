<?php

namespace Inside\Http\Controllers;

use Illuminate\Http\Request;
use Inside\Services\TotalExamesAgrupadosMesService;

class TotalExamesAcumuladoController extends Controller
{
    private $service;

    public function __construct(TotalExamesAgrupadosMesService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->service->getData($request);
    }
}
