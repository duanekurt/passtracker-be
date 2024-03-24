<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePwTrackRequest extends FormRequest
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
            'email_username' => 'required',
            'password_for' => 'required',
            'password' => 'required',
            'account_type_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'email_username' => 'Email or Username',
            'password_for' => 'Password for',
            'password' => 'Password',
            'account_type_id' => 'Account type'
        ];
    }
}
