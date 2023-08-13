<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => "required|min:3",
            'email' => "required|email|unique:users,eamil",
            'password' => "required|min:4|max:20"
        ];
    }

    public function validated($key = null, $default = null)
    {
        return array_merge($this->validator->validated(), [
            'password' => Hash::make(request('password'))
        ]);
    }
}
