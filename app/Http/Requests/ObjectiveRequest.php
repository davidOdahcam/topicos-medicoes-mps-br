<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObjectiveRequest extends FormRequest
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
            'name' => 'required|string|max:191'
        ];
    }

    public function message()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'string'   => 'Este campo deve ser do tipo string',
            'max'      => 'Este campo deve ter no máximo :max caracteres'
        ];
    }
}
