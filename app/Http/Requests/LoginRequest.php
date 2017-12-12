<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request
     */
    public function rules()
    {
        return [
            'login' => 'required|max:50'
        ];
    }

    /**
     * Get the error messages for the defined validation rules
     */
    public function messages()
    {
        return [
            'login.required' => 'Your username or email is required',
            'password.required' => 'Your password is required',
            'login.max' => 'Your username or email is too long'
        ];
    }

}
