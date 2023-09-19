<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array                  
    {
        // Si los parámetros de la función no cumplen estos valores se genera un error. 
        return [
            'title' => 'required|max:255|min:3',
            'content' => 'nullable|max:255|min:3'
        ];
    }
}
