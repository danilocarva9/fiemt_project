<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutoRequest extends FormRequest
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
            'nome' => 'required|string|min:1',
            'categoria' => 'required|string|min:1',
            'descricao' => 'required|string|min:1',
            'valor_unitario' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }

    /** metodo alterar/formatar dados antes de inserir */
    protected function prepareForValidation()
    {
        $this->merge([
            'nome' => $this->nome,
            'categoria' => $this->categoria,
            'descricao' => $this->descricao,
            'valor_unitario' => convertMoneyToDatabase($this->valor_unitario)
        ]);
    }
}
