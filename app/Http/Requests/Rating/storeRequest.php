<?php

namespace App\Http\Requests\Rating;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeRequest extends FormRequest
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
            'movie_title' => 'required',
            'username' => 'required',
            'rating' => 'required|integer',
            'r_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'movie_title.required' => 'You not provide any movie title. Please provide one',
            'username.required' => 'You not provide any username. Please provide one',
            'rating.required' => 'You not provide any rating. Please provide one',
            'rating.integer' => 'Please insert number only',
            'r_description.required' => 'You not provide any description. Please provide one',
        ];
    }
}
