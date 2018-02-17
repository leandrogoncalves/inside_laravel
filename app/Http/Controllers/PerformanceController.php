<?php

namespace Inside\Http\Controllers;

use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    private $service;

    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = ['data' => 'ola mundo'];
        return view('performance.index', $data);
    }
}
