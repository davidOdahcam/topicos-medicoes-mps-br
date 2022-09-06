<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetricRequest extends FormRequest
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
            'term'             => 'required|string|max:191',
            'notion'           => 'required|string|max:191',
            'impact'           => 'required|string|max:191',
            'synonymous'       => 'nullable|exists:metrics,id',
            'source'           => 'required|string|max:191',
            'type'             => 'required|string|max:191',
            'format'           => 'required|string|max:191',
            'indicator_type'   => 'required|string|max:191',
            'how_to_calculate' => 'required|string|max:191',
            'how_to_analyze'   => 'required|string|max:191',
            'objective_id'     => 'required|exists:objectives,id',
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
