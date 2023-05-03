<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\JaPasswordReset;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function isSystemAdmin() {
        return ($this->level == 99);
    }
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new JaPasswordReset($token));
    }
    
    public function reader()
    {
        return $this->hasOne('App\Reader');
    }
    
    
}
