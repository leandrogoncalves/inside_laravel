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
        parent::__construct();
        $this->middleware('auth');
        $this->service = $service;
    }


    public function index(Request $request)
    {
        try {
            $data = $this->service->getData($request);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), ($e->getCode() > 200? $e->getCode() : '404'));
        }

    }
}
