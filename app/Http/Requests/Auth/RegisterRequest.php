<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            // 'role' => 'required|in:admin,user',
            'password' => 'required|string|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Sila masukkan nama pengguna',
            'name.string' => 'Nama pengguna perlu aksara',
            // 'role.required' => 'Sila masukkan role',
            // 'role.in' => 'Sila masukkan role admin atau user sahaja',
            'email.required' => 'Sila masukkan emel pengguna',
            'email.unique' => 'Email ini telah didaftarkan',
            'password.required' => 'Sila masukkan kata laluan',
            'password.string' => 'Kata laluan gabungan huruf dan nombor',
        ];
    }
}
