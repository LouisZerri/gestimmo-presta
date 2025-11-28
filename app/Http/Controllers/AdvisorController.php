<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvisorContactRequest;
use App\Mail\AdvisorContactMail;
use Illuminate\Support\Facades\Mail;

class AdvisorController extends Controller
{
    public function index()
    {
        return view('advisors');
    }

    public function submit(AdvisorContactRequest $request)
    {
        Mail::to('gestimmo.presta@gmail.com')->send(
            new AdvisorContactMail($request->validated())
        );

        return back()->with('success', 'Votre demande a bien été envoyée. Nous vous recontacterons rapidement.');
    }
}