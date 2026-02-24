<?php

namespace Modules\Correspondencia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EstatusRequest extends FormRequest
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
        if ($this->has('nombre_estatus')) {
            $this->merge([
                'nombre_estatus' => strtolower(trim($this->input('nombre_estatus'))),
            ]);
        }
    }

    public function rules(): array
    {
        $id = $this->route('id');
        return [
            'nombre_estatus' => [
                'required',
                'string',
                'max:255',
                $id
                    ? Rule::unique('estatus', 'nombre_estatus')->ignore($id)
                    : Rule::unique('estatus', 'nombre_estatus'),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_estatus.required' => 'El nombre del estatus es obligatorio.',
            'nombre_estatus.string' => 'El nombre del estatus debe ser una cadena de texto.',
            'nombre_estatus.max' => 'El nombre del estatus no debe exceder los 255 caracteres.',
            'nombre_estatus.unique' => 'Ya existe un registro con este nombre. Por favor, elija otro nombre.',
        ];
    }
}
