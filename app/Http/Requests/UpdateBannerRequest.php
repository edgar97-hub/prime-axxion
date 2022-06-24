<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Banner;

class UpdateBannerRequest extends FormRequest
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
            'titulolight'=> 'required',
            'titulonegrita'=> 'required',
            'textogeneral'=> 'required',

        ];

        return $rules;
    }
    public function messages()
    {
        $messages = [
            'titulolight.required' => 'El campo titulo ligero es obligatorio',
            'titulonegrita.required' => 'El campo titulo en negrita es obligatorio.',
            'textogeneral.required' => 'El campo texto general es obligatorio.',
        ];

        return $messages;
    }
}
