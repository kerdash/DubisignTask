<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:3|max:50|unique:users',
            'email' => 'required|email|unique:users',
            'bio' => 'required|string|min:10|max:150',
            'certification' => 'sometimes|mimes:jpeg,png,jpg,gif,pdf',
            'location' => 'sometimes|regex:/^-?\d+(\.\d+)?, -?\d+(\.\d+)?$/',
            'birthdate' => 'sometimes|required|date|before:1 years ago',
        ];
    }
}
