<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingFilterRequest extends FormRequest
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
            'dateE' => ['required'],
            'dateF' => ['required'],
            'Adulte' => ['required','integer'],
            'Enfant' => ['required','integer'],
            'feature' =>['nullable'],
            'equipments' => ['nullable']
        ];
    }
}
