<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:120',
            'description' => 'nullable|min:3|max:255',
            'expired_at' => 'nullable|date|after:now'
        ];
    }
}
