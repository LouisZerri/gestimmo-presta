<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellEstimationRequest;
use App\Mail\SellEstimationMail;
use Illuminate\Support\Facades\Mail;

class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }

    public function submit(SellEstimationRequest $request)
    {
        try {
            $data = $request->validated();

            Mail::to('gestimmo.presta@gmail.com')->send(new SellEstimationMail($data));

            return back()->with('success', 'Votre demande d\'estimation a bien été envoyée ! Nous vous recontacterons sous 24h.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer.');
        }
    }
}
