<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $fillable = ['name','user_id','school_number','admission_year','department_id'];
    
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
