<?php

namespace App\Http\Requests;

use App\ReadingRecord;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class ReadingRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //$reading_record = ReadingRecord::find($this -> route ('reading_record'));
        //return ($this->user()->can('update_and_delete',$reading_record));        
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
            //'yearmonth_read' => 'required|date_format:"Ym"',
            'report' => 'required|max:255'
        ];
    }
    public function attributes()
    {
        return [
            //'yearmonth_read' => '読書年月',
            'report' => '感想'
        ];
    }
    public function messages()
    {
        return [
            //'yearmonth_read.date_format' => ':attributeは:YYYYMM形式で指定してください。'
        ];
    }
}
