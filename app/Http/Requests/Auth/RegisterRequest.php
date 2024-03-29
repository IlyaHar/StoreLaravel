<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'alpha', 'min:3', 'max:35'],
            'surname' => ['required', 'string', 'min:5', 'max:100'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:15', 'unique:'.User::class, new Phone()],
            'birthdate' => ['required', 'date', 'before_or_equal:-18 years'],
            'password' => ['required', 'string', 'confirmed',  Password::defaults()],
        ];
    }
}
