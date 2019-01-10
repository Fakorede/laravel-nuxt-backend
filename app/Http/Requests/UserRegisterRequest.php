<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{

    public function authorize()
    {
        // determine if the user is authorized to make this request.
        return true;
    }

    public function rules()
    {
        // validation rules that apply to the request.
        return [
            'email' => 'email|required|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:6'
        ];
    }
}
