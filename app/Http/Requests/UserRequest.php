<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo NAME é obrigatório!',
            'email.required' => 'O campo EMAIL é obrigatório!',
            'email.email' => 'O campo EMAIL precisa ser um endereço de e-mail válido!',
            'email.unique' => 'O e-mail informado já está em uso, cadastre um novo!',
            'password.required' => 'O campo PASSWORD é obrigatório!',
            'password.min' => 'O campo PASSWORD precisa ter no mínimo 6 caracteres!',
        ];
    }
}
