<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ClienteMaiorIdade implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determina se usuário tem mais de 18 anos.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {   
        $data = strtotime(convertDateToDatabase($value));
        $data_m = strtotime('+18 years', $data);
        //Checa se data atual é menor que data +18 anos.
        return time() < $data_m ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {   
        //Se falso retornar mensagem para o usuário
        return 'O cliente deve ser maior de 18 anos.';
    }
}
