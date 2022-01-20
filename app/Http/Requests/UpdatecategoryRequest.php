<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\category;

class UpdatecategoryRequest extends FormRequest
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
            'name_category'=> 'required',

        ];

        return $rules;
    }
    public function messages()
    {
        $messages = [
            'name_category.required' => 'El campo categoria es obligatorio',
        ];

        return $messages;
    }
}
