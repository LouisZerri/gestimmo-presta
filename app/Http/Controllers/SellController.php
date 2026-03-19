<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellEstimationRequest;
use App\Mail\SellEstimationMail;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class SellController extends Controller
{
    public function index()
    {
        $testimonials = Cache::remember('sell_testimonials', 3600, fn () => Testimonial::published()->forPage('sell')->get());
        return view('sell', compact('testimonials'));
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
