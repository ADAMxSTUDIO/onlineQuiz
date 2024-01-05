<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AuthLoginRequest extends FormRequest
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
            'email' => 'required|email|regex:/^[a-zA-Z]{4,15}@edu-emsi\.ma$/',
            'password' => [
                'required',
                Password::min(2)->letters(),
                'max:10'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    // public function messages()
    // {
    //     return [
    //         // Email error messages
    //         'email.unique' => 'Erreur, un problème est survenu! Veuillez re-lancer la page à nouveau.',
    //         'email.max' => 'Erreur, un problème est survenu! Veuillez re-lancer la page à nouveau.',
    //         'email.regex' => 'Erreur, un problème est survenu! Veuillez re-lancer la page à nouveau.',
    //         'email.required' => 'Il faut choisir obligatoirement un :attribute.',
    //         // Password error messages
    //         'agent.required' => 'Le champ d\':attribute est obligatoire.',
    //         'agent.alpha' => 'Le champ d\':attribute est invalid.',
    //         'agent.max' => 'Le champ d\':attribute ne doit pas dépaser :max.',
    //     ];
    // }
}
