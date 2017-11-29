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
            'bio' => 'nullable|max:200'
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
            'name.required' => 'Error: Your name is required',
            'username.required' => 'Error: A username is required',
            'email.required' => 'Error: Your email is required',

            'name.max' => 'Error: Your name is too long',
            'username.max'  => 'Error: Your username is too long',
            'email.max'  => 'Error: Your email is too long',
            'website.max'  => 'Error: Your website link is too long',
            'bio.max'  => 'Error: Your bio is too long',

            'email.email' => 'Error: Enter a valid email',
            'website.url' => 'Error: Enter a valid website link',
        ];
    }

}
