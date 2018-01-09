<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'current_password' => 'required',
            'new_password' => 'required|min:5|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'
        ];
    }

    /**
     * Get the error messages for the defined validation rules
     */
    public function messages()
    {
        return [
            'current_password.required' => 'Your current password is required',
            'new_password.required' => 'Your new password is required',

            'new_password.min' => 'Your new password must be > 4 in length',

            'new_password.regex' => 'Password must contain at least one uppercase/lowercase letters'
        ];
    }

}
