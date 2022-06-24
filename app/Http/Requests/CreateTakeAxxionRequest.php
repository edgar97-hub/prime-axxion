<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TakeAxxion;

class CreateTakeAxxionRequest extends FormRequest
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
        $rules = [
            'title'=> 'required',
            'short_description'=> 'required',
            'img'=> 'required',
        ];

        return $rules;
    }
    public function messages()
    {
        $messages = [
            'title.required' => 'El campo titulo es obligatorio',
            'short_description.required' => 'El campo breve descripción es obligatorio.',
            'img.required' => 'El campo img es obligatorio.',
        ];

        return $messages;
    }
}
