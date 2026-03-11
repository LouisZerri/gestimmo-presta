<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestViagerRequest;
use App\Mail\InvestViagerMail;
use Illuminate\Support\Facades\Mail;

class InvestViagerController extends Controller
{
    public function submit(InvestViagerRequest $request)
    {
        try {
            $data = $request->validated();
            Mail::to('gestimmo.presta@gmail.com')->send(new InvestViagerMail($data));
            return back()->with('success', 'Votre demande viager a bien été envoyée ! Nous vous recontacterons sous 24h.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
}
