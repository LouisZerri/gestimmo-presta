<?php

namespace App\Http\Controllers;

class SellController extends Controller
{
    /**
     * Affiche la page de mise en vente.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('sell');
    }
}