<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EdlContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'adresse_bien' => 'required|string|max:500',
            'type_bien' => 'required|string|in:Appartement,Maison,Studio,Local commercial',
            'type_edl' => 'required|string|in:Entrée,Sortie,Entrée + Sortie',
            'date_souhaitee' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email n\'est pas valide.',
            'telephone.required' => 'Le téléphone est obligatoire.',
            'adresse_bien.required' => 'L\'adresse du bien est obligatoire.',
            'type_bien.required' => 'Le type de bien est obligatoire.',
            'type_edl.required' => 'Le type d\'état des lieux est obligatoire.',
        ];
    }
}
