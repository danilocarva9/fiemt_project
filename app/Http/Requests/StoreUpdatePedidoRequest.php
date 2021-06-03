<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePedidoRequest extends FormRequest
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
            'cliente' => 'required|int|min:1',
            'produto' => 'required|int|min:1',
            'quantidade' => 'required|int|min:1',
            'valor_unitario' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'valor_total' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }

    /** metodo alterar/formatar dados antes de inserir */
    protected function prepareForValidation()
    {
        $this->merge([
            'cliente' => $this->cliente,
            'produto' => $this->produto,
            'quantidade' => $this->quantidade,
            'valor_unitario' => convertMoneyToDatabase($this->valor_unitario),
            'valor_total' => convertMoneyToDatabase($this->valor_total)
        ]);
    }
}
