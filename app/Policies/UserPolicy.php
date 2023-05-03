<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function before($user, $ability)
    {
        if ($user->isSystemAdmin()) {
            return true;
        }
    }
    
    public function update_and_delete(User $login_user, User $edit_user )
    {
        return ($login_user->id == $edit_user->id);
    }
}
