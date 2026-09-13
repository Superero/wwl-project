<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email'   => 'required|email|max:255',
            'role'  => 'required|string|max:255',
            'need'  => 'required|string|max:500',
            'company' => 'required|string|max:255',
            'message' => 'nullable|string|max:2000',
        ];
    }
    public function messages(): array
{
    return [
        'name.required'    => 'Le nom complet est obligatoire.',
        'email.required'   => 'L\'adresse email est obligatoire.',
        'email.email'      => 'L\'adresse email n\'est pas valide.',
        'company.required' => 'Le nom de l\'entreprise est obligatoire.',
        'role.required'    => 'Merci de sélectionner votre fonction.',
        'phone.required'   => 'Le numéro de téléphone est obligatoire.',
        'need.required'    => 'Merci de sélectionner votre enjeu principal.',
    ];
}
}
