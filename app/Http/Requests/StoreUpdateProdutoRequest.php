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


    protected function prepareForValidation()
    {

        // $input = $request->all();
        // $input['valor_unitario'] = preg_replace('/[.]/', '', $input['valor_unitario']);       
        // $input['valor_unitario'] = str_replace(',','.', $input['valor_unitario']);
        // $request->replace($input);

        $this->merge([
            'nome' => $this->nome,
            'categoria' => $this->categoria,
            'descricao' => $this->descricao,
            'valor_unitario' => $this->valor_unitario
        ]);
    }
}
