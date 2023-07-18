<?php

namespace App\Http\Requests\Genre;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class showRequest extends FormRequest
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
            'genre' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'genre.required' => 'You not provide any genre. Please provide one genre',
            'genre.string' => 'Please provide correct genre',
        ];
    }
}
