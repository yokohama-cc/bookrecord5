<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedBook extends Model
{
    protected $fillable = ['department_id','book_id'];
    
     
    public function book(){
        return $this->belongsTo('App\Book');
    }
}
