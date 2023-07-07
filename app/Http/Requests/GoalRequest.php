<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
