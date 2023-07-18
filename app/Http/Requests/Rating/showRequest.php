<?php

namespace App\Http\Requests\Rating;

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
            'r_date' => 'required|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'r_date.required' => 'You not provide any date.',
            'r_date.date_format' => 'Please provide correct date format example: Y-m-d',
        ];
    }
}
