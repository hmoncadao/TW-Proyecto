<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, list<string>>
     */
    public function rules(): array
    {
        $textRule = 'regex:/^[\pL\s\'-]+$/u';

        return [
            'name' => ['bail', 'required', 'string', 'max:255', $textRule],
            'surname' => ['bail', 'required', 'string', 'max:255', $textRule],
            'email' => ['bail', 'required', 'email', 'unique:users,email'],
            'phone' => ['bail', 'required', 'string', 'max:20', 'regex:/^[0-9+\s().-]+$/'],
            'address' => ['bail', 'required', 'string', 'max:255'],
            'city' => ['bail', 'required', 'string', 'max:100', $textRule],
            'postal_code' => ['bail', 'required', 'string', 'max:20'],
            'password' => ['bail', 'required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['bail', 'required', 'same:password'],
            'is_admin' => ['sometimes', 'accepted'],
            'terms' => ['bail', 'required', 'accepted'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.string' => 'El nombre es obligatorio',
            'name.max' => 'El nombre es obligatorio',
            'name.regex' => 'El nombre es obligatorio',

            'surname.required' => 'Los apellidos son obligatorios',
            'surname.string' => 'Los apellidos son obligatorios',
            'surname.max' => 'Los apellidos son obligatorios',
            'surname.regex' => 'Los apellidos son obligatorios',

            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser válido',
            'email.unique' => 'El email ya está registrado',

            'phone.required' => 'El teléfono es obligatorio',
            'phone.string' => 'El teléfono es obligatorio',
            'phone.max' => 'El teléfono es obligatorio',
            'phone.regex' => 'El teléfono es obligatorio',

            'address.required' => 'La dirección es obligatoria',
            'address.string' => 'La dirección es obligatoria',
            'address.max' => 'La dirección es obligatoria',

            'city.required' => 'La ciudad es obligatoria',
            'city.string' => 'La ciudad es obligatoria',
            'city.max' => 'La ciudad es obligatoria',
            'city.regex' => 'La ciudad es obligatoria',

            'postal_code.required' => 'El código postal es obligatorio',
            'postal_code.string' => 'El código postal es obligatorio',
            'postal_code.max' => 'El código postal es obligatorio',

            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',

            'password_confirmation.required' => 'Las contraseñas no coinciden',
            'password_confirmation.same' => 'Las contraseñas no coinciden',

            'terms.required' => 'Debes aceptar los términos y condiciones',
            'terms.accepted' => 'Debes aceptar los términos y condiciones',
        ];
    }
}
