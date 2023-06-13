<?php

namespace App\Http\Requests\Api;

use App\Traits\CanResponseTrait;
use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    use CanResponseTrait, FailedValidation;

    public function rules(): array
    {
        return [
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Password::defaults()],
        ];
    }

    public function messages(): array
    {
        return [
            'role.in' => 'Role must be holiday_maker or seasonaire',
        ];
    }
}
