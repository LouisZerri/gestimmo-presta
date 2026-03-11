<?php

namespace App\Http\Controllers;

use App\Http\Requests\EdlContactRequest;
use App\Mail\EdlContactMail;
use Illuminate\Support\Facades\Mail;

class EdlController extends Controller
{
    public function index()
    {
        return view('edl');
    }

    public function submit(EdlContactRequest $request)
    {
        try {
            $data = $request->validated();

            Mail::to('gestimmo.presta@gmail.com')->send(new EdlContactMail($data));

            return back()->with('success', 'Votre demande d\'état des lieux a bien été envoyée ! Nous vous recontacterons sous 24h.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer.');
        }
    }
}
