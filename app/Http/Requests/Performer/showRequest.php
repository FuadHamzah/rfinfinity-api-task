<?php

namespace App\Http\Requests\Performer;

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
            'performer_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'performer_name.required' => 'You not provide any performer. Please provide one performer name',
        ];
    }
}
