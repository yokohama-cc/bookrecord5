<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'company' => 'required|max:255',
            'isbn' => 'required|regex:/^[0-9]{13}$/|unique:books,isbn,'.$this->id,
        ];
    }
    public function attributes() 
    {
        return [
            'name'=>'タイトル',
            'author' => '著者',
            'company' => '出版社',
            'isbn' => 'ISBN番号'
        ];
    }
    public function messages() 
    {
        return [
            'yearmonth_publication.date_format' => ':attributeは:YYYYMM形式で入力してください。',
            'isbn.regex'  =>  ':attributeは数値１３桁で指定してください。'
        ];
    }
}
