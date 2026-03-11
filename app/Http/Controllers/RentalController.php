<?php

namespace App\Http\Controllers;

class RentalController extends Controller
{
    public function index()
    {
        return view('rental.index');
    }

    public function complete()
    {
        return view('rental.complete');
    }

    public function technical()
    {
        return view('rental.technical');
    }

    public function alacarte()
    {
        return view('rental.alacarte');
    }
}
