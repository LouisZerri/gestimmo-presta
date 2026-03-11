<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestNeufRequest;
use App\Mail\InvestNeufMail;
use Illuminate\Support\Facades\Mail;

class InvestNeufController extends Controller
{
    public function submit(InvestNeufRequest $request)
    {
        try {
            $data = $request->validated();
            Mail::to('gestimmo.presta@gmail.com')->send(new InvestNeufMail($data));
            return back()->with('success', 'Votre demande d\'investissement neuf a bien été envoyée ! Un expert vous rappellera sous 24h.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
}
