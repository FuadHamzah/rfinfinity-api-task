<?php

namespace App\Http\Requests\Movie;

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
            'title' => 'required',
            'release' => 'required|date_format:Y-m-d',
            'length' => 'required|integer',
            'description' => 'required',
            'mpaa_rating' => 'required',
            'genre' => 'required',
            'director' => 'required',
            'performer' => 'required',
            'language' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'You not provide any movie title',
            'release.required' => 'You not provide any release date.',
            'release.date_format' => 'Please provide correct date format Y-m-y',
            'length.required' => 'You not provide any length duration for this movie.',
            'length.integer' => 'Please provide length of movie in integer only.',
            'description.required' => 'You not provide any description.',
            'mpaa_rating.required' => 'You not provide any mpa rating.',
            'genre.required' => 'You not provide any genre.',
            'director.required' => 'You not provide any director.',
            'performer.required' => 'You not provide any performer.',
            'language.required' => 'You not provide any language.',
        ];
    }
}
