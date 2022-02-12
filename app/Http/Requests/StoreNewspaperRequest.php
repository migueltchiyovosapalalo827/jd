<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewspaperRequest extends FormRequest
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
            //titulo	resumo	pdf	foto	visualizacao
            'titulo' => ['required','string','unique:newspapers,titulo','max:255'],
            'resumo' => ['required'],
            'pdf' => ['mimes:pdf'],
            'foto' => ['mimes:jpeg,bmp,png,gif,svg'],
        ];
    }
}
