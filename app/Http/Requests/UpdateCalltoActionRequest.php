<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CalltoAction;

class UpdateCalltoActionRequest extends FormRequest
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


        ];

        return $rules;
    }
    public function messages()
    {
        $messages = [
            'title.required' => 'El campo titulo es obligatorio',
        ];

        return $messages;
    }
}
