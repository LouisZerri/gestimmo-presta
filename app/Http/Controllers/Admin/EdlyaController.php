<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EdlyaController extends Controller
{
    public function index()
    {
        return view('admin.edlya.index');
    }

    public function createCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $apiUrl = config('services.edlya.api_url');
        $apiKey = config('services.edlya.admin_api_key');

        try {
            $response = Http::withHeaders([
                'X-Admin-Api-Key' => $apiKey,
                'Content-Type' => 'application/json',
            ])->post($apiUrl . '/api/admin/create-code', [
                'email' => $request->email,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return back()->with('success', "Code créé pour {$data['email']} : {$data['code']}");
            }

            return back()->with('error', 'Erreur API : ' . ($response->json()['error'] ?? 'Erreur inconnue'));
        } catch (\Exception $e) {
            return back()->with('error', 'Impossible de contacter l\'API Edlya : ' . $e->getMessage());
        }
    }
}
