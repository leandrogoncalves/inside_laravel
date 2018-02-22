<?php

namespace Inside\Http\Controllers;

use Illuminate\Http\Request;
use Inside\Services\PerformanceService;

class PerformanceController extends Controller
{
    private $service;

    public function __construct(PerformanceService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = ['data' =>$this->service->getData($request)];
        return view('performance.index', $data);
    }
}
