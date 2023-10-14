<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBookingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable'],
            'lastname' => ['nullable'],
            'email' => ['nullable'],
            'phone' => ['nullable'],
            'sexe' => ['nullable'],
            'adresse' => ['nullable'],
            'dateDebut' => ['required'],
            'admin_id' => ['nullable'],
            'dateFin' => ['required'],
            'chambre_id' => ['required'],
            'montant' => ['required'],
            'nbjour' => ['required'],
            'code' => ['nullable'],
        ];
    }
}
