<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ClienteMaiorIdade as RulesClienteMaiorIdade;

class StoreClienteRequest extends FormRequest
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
            'nascimento' => [
                'required',
                 new RulesClienteMaiorIdade($this->nascimento),
            ],
            'cpf' => 'required|string|unique:clientes|min:1',
            'email' => 'required|string|email|unique:clientes|min:1'
        ];
    }

    /** metodo alterar/formatar dados antes de inserir */
    protected function prepareForValidation()
    {
        $this->merge([
            'nome' => $this->nome,
            'nascimento' => convertDateToDatabase($this->nascimento),
            'cpf' => returnOnlyNumbers($this->cpf),
            'email' => $this->email,
        ]);
    }
}