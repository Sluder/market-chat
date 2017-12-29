<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'username' => 'required|max:30',
            'email' => 'required|email|max:50',
            'website' => 'nullable|max:50',
            'bio' => 'nullable|max:200',
            'password' => 'sometimes|min:5',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'name.required' => 'Your name is required',
            'username.required' => 'A username is required',
            'email.required' => 'Your email is required',

            'name.max' => 'Your name is too long',
            'username.max'  => 'Your username is too long',
            'email.max'  => 'Your email is too long',
            'website.max'  => 'Your website link is too long',
            'bio.max'  => 'Your bio is too long',

            'email.email' => 'Enter a valid email',
            'website.url' => 'Enter a valid website link',

            'password.min' => 'Password must be at least 5 characters',
        ];
    }

}
