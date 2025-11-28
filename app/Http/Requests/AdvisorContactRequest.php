<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvisorContactRequest extends FormRequest
{
    /**
     * Autorise toujours la requête (aucune logique d'autorisation spécifique ici).
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Définit les règles de validation du formulaire de contact conseiller.
     *
     * @return array
     */
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

    /**
     * Définit les messages d'erreur personnalisés pour la validation du formulaire.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'email.email' => 'L\'adresse email n\'est pas valide.',
        ];
    }
}