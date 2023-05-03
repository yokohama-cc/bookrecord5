<?php

namespace App\Http\Requests;

use App\Reader;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReaderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //$reader = Reader::find($this -> route ('reader'));
        //return ($this->user()->can('update_and_delete',$reader));
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
            'school_number' => 'required|size:7|regex:/[0-9]{6}[A-Z]/',
        ];
    }
    public function attributes() {
        return [
            'name'=>'名前',
            'school_number'=>'学生番号',
        ];        
    }
    public function messages() {
        return [
            'school_number.regex' => ':attributeは数字６桁+英大文字(例　171000E)の形式で入力してください。'
        ];
    }
}
