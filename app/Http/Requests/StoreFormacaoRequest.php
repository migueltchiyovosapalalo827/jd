<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormacaoRequest extends FormRequest
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
            'nome' => ['required','string','unique:formacaos,nome','max:255'],
            'formador' => ['required','string'],
            'descricao'=>['required','string'],
            'data' => ['nullable','date'],
            'foto' => ['mimes:jpeg,bmp,png,gif,svg'],
        ];
    }
}
