<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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

    public function messages(): array
    {
        return [
            'title.required' => 'Hey, don\'t forget to fill in your title!',
            'title.min' => 'Oops! Your name should be at least three characters long.',
            'description.min' => 'Hold up! The description too short!!!',
        ];
    }
}
