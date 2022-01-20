<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Nosotrosdetalle;

class CreateNosotrosdetalleRequest extends FormRequest
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
            'textcolumn1'=> 'required',
            'textcolumn2'=> 'required',
        ];

        return $rules;
    }
    public function messages()
    {
        $messages = [
            'title.required' => 'El campo título ligero es obligatorio',
            'textcolumn1.required' => 'El campo breve texto 1 es obligatorio',
            'textcolumn2.required' => 'El campo breve texto 2 es obligatorio',
        ];

        return $messages;
    }
}
