<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestViagerRequest extends FormRequest
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
            'tranche_age' => 'nullable|string',
            'type_bien' => 'nullable|string',
            'objectifs' => 'nullable|array',
            'objectifs.*' => 'string',
            'message' => 'nullable|string|max:2000',
        ];
    }
}
