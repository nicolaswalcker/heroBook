<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class HeroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $id = $this->segment(2);
        $rules = [
            'name' => [
                'string',
                'required',
                'min:3',
                'max:160',
            ],
            'description' => [
                'string',
                'required',
                'min:3',
                'max:244',
            ],
            'image' => [
                'nullable',
                'image',
            ],
            'powerups' => [
                'string',
                'required',
                'min:3',
                'max:244',
            ]
        ];
        return $rules;
    }
}
