<?php

namespace Inside\Http\Controllers;

use Illuminate\Http\Request;
use Inside\Services\AcessoService;

class AcessoController extends Controller
{

    private $service;

    public function __construct(AcessoService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = ['data'=>$this->service->getData($request)];
        return view('acesso.index', $data);
    }
    public function redirectNewUser($id){
        $this->service->getNewUser($id);
    }
}
