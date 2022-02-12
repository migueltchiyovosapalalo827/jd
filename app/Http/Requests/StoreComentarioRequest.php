<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComentarioRequest extends FormRequest
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
            //texto	leitor	data	estado	blog_id
            'leitor' => ['required','string','max:255'],
            'texto' => ['required','string'],
            'blog_id' => ['required'],


        ];
    }
}
