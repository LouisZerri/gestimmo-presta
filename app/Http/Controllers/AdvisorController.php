<?php

namespace App\Http\Controllers;

class AdvisorController extends Controller
{
    public function index()
    {
        return view('advisors');
    }
}