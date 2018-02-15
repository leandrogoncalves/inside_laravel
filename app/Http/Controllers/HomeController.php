<?php

namespace Inside\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = 'olá mundo';
        //return response()->json($data);
        return view('home', compact('data'));
    }
}
