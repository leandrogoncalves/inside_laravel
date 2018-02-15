<?php

namespace Inside\Http\Controllers;

use Illuminate\Http\Request;
use Inside\Services\HomeService;

class HomeController extends Controller
{
    private $service;

    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        try {
            $data = $this->service->getData($request);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }
}
