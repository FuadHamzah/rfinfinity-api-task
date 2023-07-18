<?php

namespace App\Http\Requests\Timeslot;

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
            'theater_name' => 'required',
            'time_start' => 'required|date_format:Y-m-d H:i:s',
            'time_end' => 'required|date_format:Y-m-d H:i:s',
        ];
    }

    public function messages()
    {
        return [
            'theater_name.required' => 'Please provide theater',
            'time_start.required' => 'Please provide start date time',
            'time_start.date_format' => 'Please provide correct start date time format example: Y-m-d H:i:s',
            'time_end.required' => 'Please provide end date time',
            'time_end.date_format' => 'Please provide correct end date time format example: Y-m-d H:i:s',
        ];
    }
}
