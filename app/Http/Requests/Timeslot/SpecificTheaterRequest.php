<?php

namespace App\Http\Requests\Timeslot;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpecificTheaterRequest extends FormRequest
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
            'theater_name' => 'required',
            'd_date' => 'required|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'theater_name.required' => 'Please provide theater',
            'd_date.required' => 'Please provide date',
            'd_date.date_format' => 'Please provide correct date format example: Y-m-d',
        ];
    }
}
