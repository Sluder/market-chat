<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'username' => 'required|max:30',
            'email' => 'required|email|max:50',
            'password' => 'required|max:200'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Please enter your name.',
            'username.required' => 'Please enter your username.',
            'email.required' => 'Please enter your email.',
            'password.required' => 'Please enter a password.',
            'name.max' => 'Your name is too long.',
            'username.max'  => 'Please choose a shorter username.',
            'email.max'  => 'Your email is too long.',
            'email.email' => 'Please enter a valid email.',
            'password.max'  => 'Your password is too long.'
        ];
    }

}
