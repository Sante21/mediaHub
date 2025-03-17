<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:250',
            'description' => 'required|string|max:500',
            'release_year' => 'required|date',
            'type' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'title.string' => 'Debe de ser un string',
            'description.string' => 'Debe de ser un string',
            'release_year.date' => 'Debe de ser una fecha',
            'type.string' => 'Debe de ser una string'
        ];
    }
}
