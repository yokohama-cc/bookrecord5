<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserReaderRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'reader_name' => 'required|max:255',
            'school_number' => 'required|size:7|regex:/[0-9]{6}[A-Z]/',
            'class' => 'required|max:255'
        ];
    }
    public function attributes() {
        return [
            'name'=>'名前',
            'school_number'=>'学生番号',
            'class' => 'クラス'
        ];
    }
    public function messages() {
        return [
            'school_number.regex' => ':attributeは数字６桁➕英大文字(例　171000E)の形式で入力してください。'
        ];
    }
}
