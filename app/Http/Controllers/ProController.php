<?php

namespace App\Http\Controllers;

class ProController extends Controller
{
    public function edl()
    {
        return view('pro.edl');
    }

    public function nourrice()
    {
        return view('pro.nourrice');
    }
}
