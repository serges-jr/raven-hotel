<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'email' => ['nullable'],
            'dateDebut' => ['required'],
            'dateFin' => ['required'],
            'user_id' => ['nullable'],
            'chambre_id' => ['required'],
            'message' => ['nullable'],
            'montant' => ['required'],
            'nbjour' => ['required'],
            'admin_id' => ['nullable'],
            'code' => ['nullable'],
            'valide' => ['nullable'],
            'payer' => ['nullable'],
        ];
    }
}
