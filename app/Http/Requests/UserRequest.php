<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $old_password = Auth::user()->password; 
        Validator::extend('check_old_password', function($attribute, $value, $parameters, $validator) {
            return Hash::check($value, $parameters[0]);
        });
        return [
            'name' => 'required_with:name|string|max:255',
            'email' => 'required_with:email|string|email|max:255|unique:users,email,'.$this->id,
            'password' => 'required_with:password|string|min:6|confirmed',
            'old_password' =>  'required_with:old_password|check_old_password:'.$old_password,
            'reader_name' => 'required_with:reader_name|string|max:255',
            'school_number' => 'required_with:school_number|size:7|regex:/[0-9]{6}[A-Z]/',
        ];
    }
    public function attributes() {
        return [
            'name'=>__('label.name'),
            'email'=>__('label.email'),
            'password'=>__('label.password'),
            'old_password' => '旧パスワード',
            'reader_name'=>'ニックネーム',
            'school_number'=>'学生番号',
        ];
    }
    public function messages()
    {
        return [
            'check_old_password' => ':attributeは正しい値で入力してください。。',
            'school_number.regex' => ':attributeは数字６桁+英大文字(例　171000E)の形式で入力してください。',
        ];
    }
}
