<?php

namespace Modules\Correspondencia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriaRequest extends FormRequest
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
        if ($this->has('nombre_categoria')) {
            $this->merge([
                'nombre_categoria' => strtolower(trim($this->input('nombre_categoria'))),
            ]);
        }
    }

    public function rules(): array
    {
        $id = $this->route('id');
        return [
            'nombre_categoria' => [
                'required',
                'string',
                'max:255',
                $id
                    ? Rule::unique('categorias', 'nombre_categoria')->ignore($id)
                    : Rule::unique('categorias', 'nombre_categoria'),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_categoria.required' => 'El nombre de la categoría es obligatorio.',
            'nombre_categoria.string' => 'El nombre de la categoría debe ser una cadena de texto.',
            'nombre_categoria.max' => 'El nombre de la categoría no debe exceder los 255 caracteres.',
            'nombre_categoria.unique' => 'Ya existe un registro con este nombre. Por favor, elija otro nombre.',
        ];
    }   
}
