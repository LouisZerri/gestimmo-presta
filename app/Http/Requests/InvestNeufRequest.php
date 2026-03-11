<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestNeufRequest extends FormRequest
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
            'ville_souhaitee' => 'required|string|max:255',
            'budget' => 'required|string',
            'type_investissement' => 'required|string',
            'residences' => 'nullable|array',
            'residences.*' => 'string',
            'message' => 'nullable|string|max:2000',
        ];
    }
}
