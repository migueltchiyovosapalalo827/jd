<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidatoRequest extends FormRequest
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
            'nome' => ['required','string','unique:candidatos,nome','max:255'],
            'ni' => ['required','string','min:14'],
            'email' => ['required','string'],
            'profissao'=>['required','string'],
            'telefone' => ['required'],
            'pais' => ['required'],
            'nivelacademico' => ['required'],
        ];
    }
}
