<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChambreRequest extends FormRequest
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
     */ public function rules(): array
    {
        return [
            // 'image' => ['required'],
            'surface' => ['required'],
            'capacite' => ['required'],
            'adulte' => ['required'],
            'enfant' => ['required'],
            'prix' => ['required'],
            'description' => ['required'],
            // 'status' => ['required'],
            'category_id' => ['required'],
            'feature' => ['required'],
           'equipments' => ['required'],
        ];
    }
}
