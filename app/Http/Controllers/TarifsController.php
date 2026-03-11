<?php

namespace App\Http\Controllers;

use App\Mail\TarifsContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TarifsController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'type_service' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:2000',
        ]);

        try {
            Mail::to('gestimmo.presta@gmail.com')->send(new TarifsContactMail($data));

            return response()->json([
                'success' => true,
                'message' => 'Votre demande a bien été envoyée !'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue. Veuillez réessayer.'
            ], 500);
        }
    }
}
