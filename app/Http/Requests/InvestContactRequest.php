<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'type_bien' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Veuillez saisir votre nom.',
            'prenom.required' => 'Veuillez saisir votre prénom.',
            'email.required' => 'Veuillez saisir votre adresse email.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'telephone.required' => 'Veuillez saisir votre numéro de téléphone.',
            'message.max' => 'Votre message ne doit pas dépasser 2000 caractères.',
        ];
    }
}