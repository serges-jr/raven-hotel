<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' =>['required','min:4'] ,
            'email' =>['required'] ,
            'password' =>['nullable'] ,
            'lastname' => ['required'],
            'adresse' => ['required'],
            'phone' => ['required'],
           // 'sexe' => ['required'],
            'date' => ['required'],
            'fonction' => ['nullable'],
            'salaire' => ['nullable'],
            'dateEmbauche' => ['nullable'],
            'role' => ['required']
        ];
    }
}
