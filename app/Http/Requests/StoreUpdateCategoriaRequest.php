<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        //Returnando sempre true porque não há auth.
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
            'nome' => 'required|string|min:1'
        ];
    }

    /** metodo alterar/formatar dados antes de inserir */
    protected function prepareForValidation()
    {
        $this->merge([
            'nome' => $this->nome
        ]);
    }
}
