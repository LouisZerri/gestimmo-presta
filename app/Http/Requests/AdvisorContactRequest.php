<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvisorContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'localisation' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'email.email' => 'L\'adresse email n\'est pas valide.',
        ];
    }
}