<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'website' => 'nullable|max:50',
            'Bio' => 'nullable|max:200'
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

            'name.max' => 'Your name is too long.',
            'username.max'  => 'Please choose a shorter username.',
            'email.max'  => 'Your email is too long.',
            'website.max'  => 'Your website link is too long.',
            'bio.max'  => 'Your bio is too long.',

            'email.email' => 'Please enter a valid email.',
            'website.url' => 'Please enter a valid website link.',
        ];
    }

}
