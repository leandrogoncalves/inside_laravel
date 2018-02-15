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
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index()
    {
        return view('home.index', $this->view);
    }
}
