<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string:255',
            'description' => 'required',
            'technology_id' => 'required|numeric|exists:technologies,id',
            'start_at' => 'required|date|after:today',
            'end_at' => 'required|date|after:start_at'
        ];
    }
}
