<?php

namespace Inside\Http\Controllers;

use Illuminate\Http\Request;
use Inside\Services\AcessoService;
use Inside\Http\Requests\AcessoRequest;

class AcessoController extends Controller
{

    private $service;

    public function __construct(AcessoService $service)
    {
        $this->service = $service;
    }

    public function index(AcessoRequest $request)
    {
        $data = ['data'=>$this->service->getData($request)];
        return view('acesso.index', $data);
    }
    public function redirectNewUser($email, AcessoRequest $request){
       return $this->service->getNewUser($email);
    }
}
