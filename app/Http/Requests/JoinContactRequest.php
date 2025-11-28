<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoinContactRequest extends FormRequest
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
     * Définit les règles de validation du formulaire de contact "Nous rejoindre".
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'situation' => 'required|string|in:agent_immobilier,mandataire,reconversion,debutant,autre',
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
            'nom.required' => 'Veuillez saisir votre nom.',
            'prenom.required' => 'Veuillez saisir votre prénom.',
            'email.required' => 'Veuillez saisir votre adresse email.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'telephone.required' => 'Veuillez saisir votre numéro de téléphone.',
            'ville.required' => 'Veuillez saisir votre ville.',
            'situation.required' => 'Veuillez sélectionner votre situation actuelle.',
            'situation.in' => 'La situation sélectionnée n\'est pas valide.',
            'message.max' => 'Votre message ne doit pas dépasser 2000 caractères.',
        ];
    }
}