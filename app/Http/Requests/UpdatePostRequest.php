<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust authorization as needed
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'nullable|exists:users,id', // Optional, if you want to update user_id
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'body.required' => 'The body is required.',
            'user_id.exists' => 'The selected user ID is invalid.',
        ];
    }
}
