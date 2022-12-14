<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectiveRequest extends FormRequest
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
            'name'       => 'required|string|max:191',
            'purpose_id' => 'required|exists:purposes,id'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'string'   => 'Este campo deve ser do tipo string',
            'max'      => 'Este campo deve ter no máximo :max caracteres'
        ];
    }
}
