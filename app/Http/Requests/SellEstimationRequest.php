<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellEstimationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'adresse' => 'required|string|max:500',
            'ville' => 'required|string|max:255',
            'type_bien' => 'required|string|in:Appartement,Maison,Immeuble,Terrain,Local commercial',
            'surface' => 'required|numeric|min:1',
            'nb_pieces' => 'required|integer|min:1|max:10',
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'adresse.required' => 'L\'adresse du bien est obligatoire.',
            'ville.required' => 'La ville est obligatoire.',
            'type_bien.required' => 'Le type de bien est obligatoire.',
            'surface.required' => 'La surface est obligatoire.',
            'nb_pieces.required' => 'Le nombre de pièces est obligatoire.',
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email n\'est pas valide.',
            'telephone.required' => 'Le téléphone est obligatoire.',
        ];
    }
}
