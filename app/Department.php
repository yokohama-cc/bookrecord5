<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function assignedbooks(){
        return $this->hasMany('App\AssignedBook');
    }
}
