<?php

namespace Inside\Http\Controllers;

use Illuminate\Http\Request;
use Inside\Services\HomeService;

class HomeController extends Controller
{
    private $service;

    public function __construct(HomeService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data =  $this->service->getData($request);
        dd($data);
        return view('home.index', $this->view);
    }
}
