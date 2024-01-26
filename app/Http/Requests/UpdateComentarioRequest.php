<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComentarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            //
            'nome' => ['required','string','max:255'],
            // criar com de validação de email deve ser unique excepto para o id do usuario que estada editar
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $this->route()->parameter('candidato')->user->id],
            'profissao'=>['required','string'],
            'telefone' => ['required'],
            'pais' => ['required'],
            'empresa' => ['required'],
            'nivelacademico' => ['required'],
        ];
    }
}
