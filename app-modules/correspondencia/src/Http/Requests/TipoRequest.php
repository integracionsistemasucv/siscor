<?php

namespace Modules\Correspondencia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Log;

class TipoRequest extends FormRequest
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
    public function prepareForValidation()
    {
        if ($this->has('nombre_tipo')) {
            $this->merge([
                'nombre_tipo' => strtolower(trim($this->input('nombre_tipo'))),
            ]);
        }
    }

    public function rules(): array
    {
    
        $id = $this->route('id');
        
        return [
            'nombre_tipo' => [
                'required',
                'string',
                'max:255',
                $id
                    ? Rule::unique('tipos', 'nombre_tipo')->ignore($id, 'id_tipo')
                    : Rule::unique('tipos', 'nombre_tipo'),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_tipo.required' => 'El nombre del tipo es obligatorio.',
            'nombre_tipo.string' => 'El nombre del tipo debe ser una cadena de texto.',
            'nombre_tipo.max' => 'El nombre del tipo no debe exceder los 255 caracteres.',
            'nombre_tipo.unique' => 'Ya existe un registro con este nombre. Por favor, elija otro nombre.',
        ];
    }
}
