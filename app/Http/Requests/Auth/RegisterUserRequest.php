<?php

namespace App\Http\Requests\Auth;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return array_merge(parent::messages(), [
           'name:min' => 'User\'s name should be at least 2 symbols',
           'surname:min' => 'User\'s name should be at least 2 symbols',
            'phone' => 'Incorrect phone format',
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:2', 'max:35'],
            'surname' => ['required', 'min:2', 'max:50'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users', new Phone],
            'birthdate' => ['required', 'date', 'before_or_equal: -18 years'],
            'password' => ['required', 'confirmed', Password::default()]


        ];
    }
}
