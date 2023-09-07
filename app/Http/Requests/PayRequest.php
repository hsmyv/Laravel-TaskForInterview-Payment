<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
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
            'number' => 'required|numeric|digits_between:13,17',
            'full_name' => 'required|string|max:255',
            'expiration_date' => 'required|regex:/^\d{2}\/\d{2}$/',
            'cvv' => 'required|numeric|digits_between:3,4',
        ];
    }
}
