<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtigoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
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
            'titulo' => ['required','string','unique:artigos,titulo','max:255'],
            'autor' => ['required','string'],
            'conteudo'=>['required','string'],
            'tipo' => ['required'],
            'resumo' => ['required'],
            'foto' => ['mimes:jpeg,bmp,png,gif,svg'],

        ];
    }
}
