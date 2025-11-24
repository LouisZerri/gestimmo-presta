<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageContactRequest extends FormRequest
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
            'type_demande' => 'required|string|in:tarifs_unitaires,gestion_complete,devis_syndic',
            'adresse_bien' => 'nullable|string|max:500',
            'type_bien' => 'nullable|string|max:100',
            'surface' => 'nullable|numeric|min:1',
            'loyer_mensuel' => 'nullable|numeric|min:0',
            'nb_lots' => 'nullable|integer|min:1',
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
            'type_demande.required' => 'Le type de demande est requis.',
            'type_demande.in' => 'Le type de demande n\'est pas valide.',
        ];
    }
}